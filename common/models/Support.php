<?php

namespace common\models;

use Yii;
use common\components\Utility;

/**
 * This is the model class for table "support".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $provider_id
 * @property integer $service_id
 * @property integer $sub_service_id
 * @property string $name
 * @property string $email
 * @property string $message
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Services $subService
 * @property User $user
 * @property User $provider
 * @property Services $service
 */
class Support extends \common\models\base\BaseSupport
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'support';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'provider_id', 'service_id', 'sub_service_id'], 'integer'],
            [['message', 'status'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'email'], 'string', 'max' => 255],
            [['sub_service_id'], 'exist', 'skipOnError' => true, 'targetClass' => Services::className(), 'targetAttribute' => ['sub_service_id' => 'category_id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['provider_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['provider_id' => 'id']],
            [['service_id'], 'exist', 'skipOnError' => true, 'targetClass' => Services::className(), 'targetAttribute' => ['service_id' => 'category_id']],
            [['name','email','message','provider_id','service_id','sub_service_id'],'required'],
            [['email'],'email']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'provider_id' => 'Provider ID',
            'service_id' => 'Service ID',
            'sub_service_id' => 'Sub Service ID',
            'name' => 'Name',
            'email' => 'Email',
            'message' => 'Message',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubService()
    {
        return $this->hasOne(Services::className(), ['category_id' => 'sub_service_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
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
    public function getService()
    {
        return $this->hasOne(Services::className(), ['category_id' => 'service_id']);
    }

    /**
     * @inheritdoc
     * @return \common\models\query\SupportQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\SupportQuery(get_called_class());
    }
    
    public function saveQuery($data) {
        if ($this->validate() && $this->save()) {
            $data['request'] = 'support';
            $data['provider'] = $this->provider->first_name . ' ' . $this->provider->last_name;
            $data['service'] = $this->service->category_name . ' ' . $this->subService->category_name;
            $data['logo'] = 'logo';
            Utility::sendMail($data);
            return true;
        } else {
            return $this;
        }
    }

}