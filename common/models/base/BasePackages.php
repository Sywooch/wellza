<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "packages".
 *
 * @property integer $package_id
 * @property integer $service_id 
 * @property integer $sub_service_id
 * @property integer $discount_price
 * @property string $package_name
 * @property string $service_time
 * @property string $service_price
 * @property string $available_date
 * @property string $available_time
 * @property string $preparation_status
 * @property string $description
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Appointment[] $appointments
 * @property Services $service
 * @property Services $subService
 */
class BasePackages extends \yii\db\ActiveRecord
{   
    public $on_date;
    public $sub_service_id;
    public $category_name;
    public $sub_category_name;
    public $start_time;
    public $end_time;
    public $minutes_duration;
    public $service_price;    
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'packages';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
              [['sub_service_id','service_id','on_date','category_name','sub_category_name','start_time','end_time','minutes_duration','service_price','parent','preparation_status'],'trim'],  
            [['sub_service_id'], 'required'],
            [['on_date'], 'required'],
            [['sub_service_id'], 'integer']                      
        ];
    }
    
      
        
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'package_id' => 'Package ID',
            'service_id' => 'Service ID',
            'parent' => 'Parent',
            'preparation_status' => 'Preparation Status',            
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAppointments()
    {
        return $this->hasMany(\common\models\Appointment::className(), ['package_id' => 'package_id']);
    }    
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getService()
    {
        return $this->hasOne(\common\models\Services::className(), ['category_id' => 'service_id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent0()
    {
        return $this->hasOne(\common\models\Services::className(), ['category_id' => 'parent']);
    }
    
}
