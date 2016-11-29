<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "gift_voucher".
 *
 * @property integer $id
 * @property string $code
 * @property string $from_name
 * @property string $from_email
 * @property string $to_name
 * @property string $to_email
 * @property string $delivery_date
 * @property string $message
 * @property string $amount
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 *
 * @property VoucherHistory[] $voucherHistories
 */
class BaseGiftVoucher extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gift_voucher';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['delivery_date', 'created_at', 'updated_at'], 'safe'],
            [['message', 'status'], 'string'],
            [['amount'], 'number'],
            [['code'], 'string', 'max' => 40],
            [['from_name', 'to_name'], 'string', 'max' => 80],
            [['from_email', 'to_email'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Code',
            'from_name' => 'From Name',
            'from_email' => 'From Email',
            'to_name' => 'To Name',
            'to_email' => 'To Email',
            'delivery_date' => 'Delivery Date',
            'message' => 'Message',
            'amount' => 'Amount',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVoucherHistories()
    {
        return $this->hasMany(VoucherHistory::className(), ['voucher_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \common\models\query\GiftVoucherQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\GiftVoucherQuery(get_called_class());
    }
}
