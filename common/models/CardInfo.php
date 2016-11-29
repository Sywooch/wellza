<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "card_info".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $card_id
 * @property string $customer_id
 * @property string $brand
 * @property string $card_last_digit
 * @property string $holder_name
 * @property string $response_data
 * @property string $created_at
 * @property string $updated_at
 *
 * @property User $user
 */
class CardInfo extends \common\models\base\BaseCardInfo
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'card_info';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'integer'],
            [['response_data'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['card_id', 'customer_id', 'holder_name'], 'string', 'max' => 80],
            [['brand'], 'string', 'max' => 60],
            [['card_last_digit'], 'string', 'max' => 20],
            [['fingerprint'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
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
            'card_id' => 'Card ID',
            'customer_id' => 'Customer ID',
            'brand' => 'Brand',
            'card_last_digit' => 'Card Last Digit',
            'holder_name' => 'Holder Name',
            'response_data' => 'Response Data',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @inheritdoc
     * @return \common\models\query\CardInfoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\CardInfoQuery(get_called_class());
    }
    
    public static function saveCardInfo($data){
        $model = new CardInfo;
        $model->load($data,'');
        return $model->save(false);
    }
    public static function getCardByFingerPrint($fingerPrint){
        return $card = self::find()->byFingerprint($fingerPrint)->one();
        
    }
}
