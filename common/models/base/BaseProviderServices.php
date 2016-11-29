<?php

namespace common\models\base;

use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "provider_services".
 *
 * @property integer $id
 * @property integer $provider_id
 * @property integer $service_id
 * @property integer $sub_service_id
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Services $service
 * @property User $provider
 * @property Services $subService
 */
class BaseProviderServices extends \yii\db\ActiveRecord
{   
    public $access_token;
    public $add_service;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'provider_services';
    }
        
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['provider_id','service_id','sub_service_id'], 'trim'],
            [['add_service'], 'required'],            
            [['created_at', 'updated_at'], 'safe'],
        ];
    }
    
    
    
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'provider_id' => 'Provider ID',
            'service_id' => 'Service ID',
            'sub_service_id' => 'Sub Service ID',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getService()
    {
        return $this->hasOne(Services::className(), ['category_id' => 'service_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProvider()
    {
        return $this->hasOne(User::className(), ['id' => 'provider_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubService()
    {
        return $this->hasOne(Services::className(), ['category_id' => 'sub_service_id']);
    }  
            
}