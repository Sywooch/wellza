<?php

namespace common\models;

use Yii;
use common\models\base\BaseAvailability;
use common\models\query\AvailabilityQuery;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\helpers\ArrayHelper;
use yii\db\ActiveQuery;
use common\components\customvalidators\CheckTimeFormatValidator;

/**
 * This is the model class for table "availability".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $on_date
 * @property string $from_time
 * @property string $to_time
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Availability $availability
 */
class Availability extends BaseAvailability {

    /**
     * @inheritdoc
     */
    public function rules() {
        return ArrayHelper::merge(
                        parent::rules(), [
                    ['slot_id', 'required', 'on' => ['editavailability', 'deleteavailability']],
                    ['slot_id', 'integer', 'on' => ['editavailability', 'deleteavailability']],
                    [['slot_id', 'from_time', 'to_time', 'on_date'], 'trim', 'on' => 'providerAvailability']
        ]);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return ArrayHelper::merge(
                        parent::attributeLabels(), [
        ]);
    }

    /**
     * Scenario for availability
     */
    public function scenarios() {
        $scenarios = parent::scenarios();
        $scenarios['editavailability'] = ['slot_id', 'from_time', 'to_time', 'on_date'];
        $scenarios['deleteavailability'] = ['slot_id'];
        $scenarios['myavailability'] = ['on_date'];
        $scenarios['providerAvailability'] = ['slot_id', 'from_time', 'to_time', 'on_date'];
        return $scenarios;
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
                    \yii\db\ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    \yii\db\ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * @inheritdoc
     * @return \common\models\query\AvailabilityQuery the active query used by this AR class.
     */
    public static function find() {
        return new \common\models\query\AvailabilityQuery(get_called_class());
    }

    /**
     * Save data for available time slots
     */
    public function manageAvailableSlot($user_id = null, $format = null) {
        $slot_id = $this->slot_id;
        Yii::$app->db->createCommand('set foreign_key_checks=0')->execute();
        //$availability = new BaseAvailability();
        $availability = new Availability();
        if (empty($slot_id)) {

            $availability = $this->setValue($availability, $user_id);
            
            if ($availability->save(false)) {
                Yii::$app->db->createCommand('set foreign_key_checks=1')->execute();
                $returndata = self::find()->select('id as slot_id,from_time,to_time')->ById($availability->id)->asArray()->one();
                
                if ($format == 'xml') {
                    $returndata = array();
                    $xml = new \yii\web\XmlResponseFormatter();
                    \Yii::$app->response->format = \yii\web\Response::FORMAT_XML;
                    $xml->rootTag = 'data';
                    Yii::$app->response->formatters['xml'] = $xml;
                    foreach ($availability as $data) {
                        $returndata['event']['id'] = $availability->id;
                        $returndata['event']['start_date'] = $availability->on_date . ' ' . $availability->from_time;
                        $returndata['event']['end_date'] = $availability->on_date . ' ' . $availability->to_time;
                        $returndata['event']['text'] = '';
                        $returndata['event']['details'] = '';
                    }
                    return $returndata;
                }

                return $returndata;
            } else {
                return false;
            }
        } else {

            $availability = self::findOne(['id' => $slot_id]);
            if (!empty($availability)) {
                $availability = $this->setValue($availability);
                $availability->update();
                Yii::$app->db->createCommand('set foreign_key_checks=1')->execute();
                return true;
            } else {
                return false;
            }
            return false;
        }
    }

    /**
     * Set the data values for the properties
     */
    public function setValue($availability = null, $id = null) {
        //This will execute when call from api's
        
        if (!empty($id)) {
            $availability->user_id = $id;
            
        }

        if (!empty($this->on_date)) {
            $availability->on_date = $this->on_date;
        }

        if (!empty($this->from_time)) {
            $availability->from_time = $this->from_time;
        }

        if (!empty($this->to_time)) {
            $availability->to_time = $this->to_time;
        }
        
        return $availability;
    }

    /**
     * Get data for available time slots
     */
    public function getAvailableSlot() {
        $on_date = $this->on_date;
        return self::find()->select("`id` AS `slot_id`, `from_time`,`to_time`")->ByDate($on_date)->asArray()->all();
    }

    /**
     * Arrange date format
     */
    public function getFormatedDate($on_date = null) {
        $datarray = explode('-', $on_date);
        $on_date = $datarray['2'] . '-' . $datarray['1'] . '-' . $datarray['0'];
        return $on_date;
    }

    /**
     * Delete an alloted time slot
     */
    public static function deleteSlot($user_id = null,$slot_id = null) {
        $model = self::find()->ByEventNUserID($slot_id,$user_id)->one();
        if (!empty($model)) {
            return $model->delete();
        } else {
            return null;
        }
    }

    /**
     * Get all the alloted time slot
     */
    public static function getAllSlot($id = null) {
        $returndata = array();
        $xml = new \yii\web\XmlResponseFormatter();
        if(!empty($id)) {
            $results = self::find()->ByUserId($id)->all();
        } else {
            $results = self::find()->all();
        }
        
        //return $results;        
        if (!empty($results)) {
            $i= 0;
            foreach ($results as $data) {
                $returndata[$i]['event']['id'] = $data->id;
                $returndata[$i]['event']['start_date'] = $data->on_date . ' ' . $data->from_time;
                $returndata[$i]['event']['end_date'] = $data->on_date . ' ' . $data->to_time;
                $returndata[$i]['event']['text'] = '';
                $returndata[$i]['event']['details'] = '';
                $i++;
            }

            \Yii::$app->response->format = \yii\web\Response::FORMAT_XML;
            $xml->rootTag = 'data';
            Yii::$app->response->formatters['xml'] = $xml;
            return $returndata;
        }
        return null;
    }
    
     /**
     * Get all the provider with their time slot
      * @param null
      * @return Array This consists the data for provider and his slots | Null
     */
    public static function getAllProviders() {
        $returdata = array();
        $user_ids = self::find()->select('user_id')->distinct()->asArray()->all();
                
        if(!empty($user_ids)) {
            for($i=0;$i<count($user_ids);$i++) {
                $returdata[$i] = User::findAllByIdentity($user_ids[$i]['user_id']);
            }
            return $returdata;
        }         
        return null;
    }
    
}
