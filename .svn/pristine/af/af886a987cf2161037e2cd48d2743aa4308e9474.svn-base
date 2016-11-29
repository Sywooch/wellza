<?php
namespace common\models\base;

use Yii;
use common\models\query;
use yii\helpers\ArrayHelper;
use common\models\Authtoken;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
//use common\models\Services;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * This is the model class for table "services".
 *
 * @property integer $category_id
 * @property string $category_name
 * @property string $category_image
 * @property integer $parent
 * @property string $description
 * @property string $created_at
 * @property string $updated_at
 */
class BaseServices extends \yii\db\ActiveRecord
{           
    //public $category_id;
    public $sub_category_id;
    public $latitude;
    public $longitude;
    public $icon_name;
        
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'services';
    }
       
    /**
     * Define rules for validation
     */
    public function rules()
    {
        return [
                [['category_id'], 'integer'],
                [['category_id'], 'required'],
                [['category_id'], 'compare','compareValue' => 0,'operator' => '>','message' =>'Category_id is not valid'],
            ];
    }
    
    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(common\models\User::className(), ['id' => 'user_id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(\common\models\Product::className(), ['category_id' => 'category_id','sub_category_id' => 'category_id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderDetail()
    {
        return $this->hasOne(\common\models\OrderDetail::className(), ['product_id' => 'category_id']);
    }
    
    public function getPackages()
    {
        return $this->hasOne(\common\models\Packages::className(), ['service_id' => 'category_id','parent' => 'category_id']);
    }
    
    
}
