<?php

namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\helpers\ArrayHelper;
use common\models\query\CouponQuery;

/**
 * This is the model class for table "coupon".
 *
 * @property integer $id
 * @property string $name
 * @property string $code
 * @property string $discount
 * @property string $type
 * @property string $total
 * @property string $date_start
 * @property string $date_end
 * @property integer $uses_total
 * @property integer $uses_customer
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 *
 * @property CouponHistory[] $couponHistories
 */
class Coupon extends base\BaseCoupon {

    /**
     * Number of parts of the code.
     *
     * @var integer
     */
    protected $_parts = 3;

    /**
     * Length of each part.
     *
     * @var integer
     */
    protected $_partLength = 4;

    /**
     * Alphabet used when generating codes. Already leaves
     * easy to confuse letters out.
     *
     * @var array
     */
    protected $_symbols = [
        '0', '1', '2', '3', '4', '5', '6', '7', '8', '9',
        'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'J', 'K',
        'L', 'M', 'N', 'P', 'Q', 'R', 'T', 'U', 'V', 'W',
        'X', 'Y'
    ];

    /**
     * ROT13 encoded list of bad words.
     *
     * @var array
     */
    protected $_badWords = [
        'SHPX', 'PHAG', 'JNAX', 'JNAT', 'CVFF', 'PBPX', 'FUVG', 'GJNG', 'GVGF', 'SNEG', 'URYY',
        'ZHSS', 'QVPX', 'XABO', 'NEFR', 'FUNT', 'GBFF', 'FYHG', 'GHEQ', 'FYNT', 'PENC', 'CBBC',
        'OHGG', 'SRPX', 'OBBO', 'WVFZ', 'WVMM', 'CUNG'
    ];

    /**
     * Constructor.
     *
     * @param array $config Available options are `parts` and `partLength`.
     */
    public function __construct(array $config = []) {
        $config += [
            'parts' => null,
            'partLength' => null
        ];
        if (isset($config['parts'])) {
            $this->_parts = $config['parts'];
        }
        if (isset($config['partLength'])) {
            $this->_partLength = $config['partLength'];
        }
    }

    public function rules() {
        return ArrayHelper::merge(
                        parent::rules(), [
        ]);
    }

    public function attributeLabels() {
        return ArrayHelper::merge(
                        parent::attributeLabels(), [
        ]);
    }

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * Generates a coupon code using the format `XXXX-XXXX-XXXX`.
     *
     * The 4th character of each part is a checkdigit.
     *
     * Not all letters and numbers are used, so if a person enters the letter 'O' we
     * can automatically correct it to the digit '0' (similarly for I => 1, S => 5, Z
     * => 2).
     *
     * The code generation algorithm avoids 'undesirable' codes. For example any code
     * in which transposed characters happen to result in a valid checkdigit will be
     * skipped.  Any generated part which happens to spell an 'inappropriate' 4-letter
     * word (e.g.: 'P00P') will also be skipped.
     *
     * @param string $random Allows to directly support a plaintext i.e. for testing.
     * @return string Dash separated and normalized code.
     */
    public function generate($random = null) {
        $results = [];

        $plaintext = $this->_convert($random ? : $this->_random(8));
        // String is already normalized by used alphabet.

        $part = $try = 0;
        while (count($results) < $this->_parts) {
            $result = substr($plaintext, $try * $this->_partLength, $this->_partLength - 1);

            if (!$result || strlen($result) !== $this->_partLength - 1) {
                throw new Exception('Ran out of plaintext.');
            }
            $result .= $this->_checkdigitAlg1($part + 1, $result);

            $try++;
            if ($this->_isBadWord($result) || $this->_isValidWhenSwapped($result)) {
                continue;
            }
            $part++;

            $results[] = $result;
        }
        return implode('-', $results);
    }

    /**
     * Validates given code. Codes are not case sensitive and
     * certain letters i.e. `O` are converted to digit equivalents
     * i.e. `0`.
     *
     * @param $code string Potentially unnormalized code.
     * @return boolean
     */
    public function validate($code) {
        $code = $this->_normalize($code, ['clean' => true, 'case' => true]);

        if (strlen($code) !== ($this->_parts * $this->_partLength)) {
            return false;
        }
        $parts = str_split($code, $this->_partLength);

        foreach ($parts as $number => $part) {
            $expected = substr($part, -1);
            $result = $this->_checkdigitAlg1($number + 1, $x = substr($part, 0, strlen($part) - 1));

            if ($result !== $expected) {
                return false;
            }
        }
        return true;
    }

    /**
     * Implements the checkdigit algorithm #1 as used by the original library.
     *
     * @param integer $partNumber Number of the part.
     * @param string $value Actual part without the checkdigit.
     * @return string The checkdigit symbol.
     */
    protected function _checkdigitAlg1($partNumber, $value) {
        $symbolsFlipped = array_flip($this->_symbols);
        $result = $partNumber;

        foreach (str_split($value) as $char) {
            $result = $result * 19 + $symbolsFlipped[$char];
        }
        return $this->_symbols[$result % (count($this->_symbols) - 1)];
    }

    /**
     * Verifies that a given value is a bad word.
     *
     * @param string $value
     * @return boolean
     */
    protected function _isBadWord($value) {
        return isset($this->_badWords[str_rot13($value)]);
    }

    /**
     * Verifies that a given code part is still valid its symbols
     * are swapped (undesirable).
     *
     * @param string $value
     * @return boolean
     */
    protected function _isValidWhenSwapped($value) {
        return false;
    }

    /**
     * Normalizes a given code using dash separators.
     *
     * @param string $string
     * @return string
     */
    public function normalize($string) {
        $string = $this->_normalize($string, ['clean' => true, 'case' => true]);
        return implode('-', str_split($string, $this->_partLength));
    }

    /**
     * Converts givens string using symbols.
     *
     * @param string $string
     * @return string
     */
    protected function _convert($string) {
        $symbols = $this->_symbols;

        $result = array_map(function($value) use ($symbols) {
            return $symbols[ord($value) & (count($symbols) - 1)];
        }, str_split(hash('sha1', $string)));

        return implode('', $result);
    }

    /**
     * Internal method to normalize given strings.
     *
     * @param string $string
     * @param array $options
     * @return string
     */
    protected function _normalize($string, array $options = []) {
        $options += [
            'clean' => false,
            'case' => false
        ];
        if ($options['case']) {
            $string = strtoupper($string);
        }
        $string = strtr($string, [
            'I' => 1,
            'O' => 0,
            'S' => 5,
            'Z' => 2,
        ]);

        if ($options['clean']) {
            $string = preg_replace('/[^0-9A-Z]+/', '', $string);
        }
        return $string;
    }

    /**
     * Generates a cryptographically secure sequence of bytes.
     *
     * @param integer $bytes Number of bytes to return.
     * @return string
     */
    protected function _random($bytes) {
        if (is_readable('/dev/urandom')) {
            $stream = fopen('/dev/urandom', 'rb');
            $result = fread($stream, $bytes);

            fclose($stream);
            return $result;
        }
        if (function_exists('mcrypt_create_iv')) {
            return mcrypt_create_iv($bytes, MCRYPT_DEV_RANDOM);
        }
        throw new Exception("No source for generating a cryptographically secure seed found.");
    }
    
    /**
     * Get all the records for Coupon
     * @return Dataproivder|Null
     */
    public static function getAllCoupon() {
        
        $query = self::find();
            $dataProvider = new \yii\data\ActiveDataProvider([
                'query' => $query,
                'pagination' => [
                    'pageSize' => 10,
                ],
            ]);
        return $dataProvider;    
    }
    
    /**
     * Get all the records for Gift Cards
     * @return Dataproivder|Null
     */
    public static function getCouponData($id = null) {
        $returndata = self::find()->ById($id)->asArray()->one();
        $startdate = $returndata['date_start'];
        if(!empty($startdate)) {
            $startdate_array = explode('-', $startdate);
            $returndata['date_start'] = $startdate_array[2].'-'.$startdate_array[1].'-'.$startdate_array[0];
        }
        $enddate = $returndata['date_end'];
        if(!empty($enddate)) {
            $enddate_array = explode('-', $enddate);
            $returndata['date_end'] = $enddate_array[2].'-'.$enddate_array[1].'-'.$enddate_array[0];
        }      
        
        return $returndata;            
    }
    
    /**
     * Save coupon data in the database
     * @return object Coupon|Null
     */
    public function saveCouponData() {
        $model = new Coupon();
         
        $model->name  = !empty($this->name) ? $this->name : '';
        $model->code  = !empty($this->code) ? $this->code : '';
        $model->discount  = !empty($this->discount) ? $this->discount : '';
        
        if(!empty($this->date_start)) {
            $start_date = $this->date_start;
            $start_date_array = explode('-', $start_date);
            $model->date_start  = $start_date_array[2].'-'.$start_date_array[1].'-'.$start_date_array[0];
        }
        
        if(!empty($this->date_end)) {
            $end_date = $this->date_end;
            $end_date_array = explode('-', $end_date);
            $model->date_end  = $end_date_array[2].'-'.$end_date_array[1].'-'.$end_date_array[0];
        }       
        
        $model->uses_total  = !empty($this->uses_total) ? $this->uses_total : '';
        $model->status = 'Active';
        
        if($model->save(false)) {
            return true;
        } 
        return false;            
    }
    
    /**
     * Update coupon data in the database
     * @return object Coupon|Null
     */
    public function updateCouponData($id = null) {
        
        $model = Coupon::findOne(['id' => $id]);
        
        $model->name  = !empty($this->name) ? $this->name : '';
        $model->code  = !empty($this->code) ? $this->code : '';
        $model->discount  = !empty($this->discount) ? $this->discount : '';
        
        if(!empty($this->date_start)) {
            $start_date = $this->date_start;
            $start_date_array = explode('-', $start_date);
            $model->date_start  = $start_date_array[2].'-'.$start_date_array[1].'-'.$start_date_array[0];
        }
        
        if(!empty($this->date_end)) {
            $end_date = $this->date_end;
            $end_date_array = explode('-', $end_date);
            $model->date_end  = $end_date_array[2].'-'.$end_date_array[1].'-'.$end_date_array[0];
        }       
        
        $model->uses_total  = !empty($this->uses_total) ? $this->uses_total : '';
        $model->status = 'Active';
        if($model->update(false)) {
            return true;
        } 
        return false;             
    }
    
    /***
     * Delete a coupon
     * @params id
     * @return True|False
     * ** */

    public static function deleteCoupon($id = null) {
        return self::deleteAll('id = :id', [':id' => $id]);
    }
    
    /**
     * Update the status of a Coupon
     * @param type id, status
     * @return True|False
     */
    public static function updateStatus($id = null, $status = null) {
        return self::updateAll(['status' => $status], "id = {$id}");
    }

}
