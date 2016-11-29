<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "cart".
 *
 * @property integer $id
 * @property integer $customer_id
 * @property string $session_id
 * @property integer $product_id
 * @property integer $appointment_id
 * @property string $type
 * @property integer $type_id
 * @property integer $quantity
 * @property string $created_at
 * @property string $updated_at
 *
 * @property User $customer
 */
class BaseCart extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cart';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['customer_id', 'type_id', 'quantity'], 'integer'],
            [['type'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['customer_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
       return [
            'id' => 'ID',
            'customer_id' => 'Customer ID',
            'type' => 'Type',
            'type_id' => 'Type ID',
            'quantity' => 'Quantity',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(User::className(), ['id' => 'customer_id']);
    }
}
