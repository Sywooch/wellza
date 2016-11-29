<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $invoice_number
 * @property string $store_name
 * @property string $currency
 * @property string $payment_method
 * @property string $comment
 * @property integer $order_tracking_number
 * @property string $total
 * @property string $shipping_charge
 * @property string $tax
 * @property string $status
 * @property string $ip_address
 * @property string $user_agent
 * @property string $created_at
 * @property string $updated_at
 *
 * @property CouponHistory[] $couponHistories
 * @property GiftVoucher[] $giftVouchers
 * @property User $user
 * @property OrderDetail[] $orderDetails
 * @property TransactionTable[] $transactionTables
 * @property VoucherHistory[] $voucherHistories
 */
class BaseOrder extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'order_tracking_number'], 'integer'],
            [['comment', 'status'], 'string'],
            [['total', 'shipping_charge', 'tax'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['invoice_number', 'ip_address', 'user_agent'], 'string', 'max' => 150],
            [['store_name'], 'string', 'max' => 60],
            [['currency'], 'string', 'max' => 20],
            [['payment_method'], 'string', 'max' => 100],
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
            'invoice_number' => 'Invoice Number',
            'store_name' => 'Store Name',
            'currency' => 'Currency',
            'payment_method' => 'Payment Method',
            'comment' => 'Comment',
            'order_tracking_number' => 'Order Tracking Number',
            'total' => 'Total',
            'shipping_charge' => 'Shipping Charge',
            'tax' => 'Tax',
            'status' => 'Status',
            'ip_address' => 'Ip Address',
            'user_agent' => 'User Agent',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCouponHistories()
    {
        return $this->hasMany(CouponHistory::className(), ['order_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGiftVouchers()
    {
        return $this->hasMany(GiftVoucher::className(), ['order_id' => 'id']);
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
    public function getOrderDetails()
    {
        return $this->hasMany(OrderDetail::className(), ['order_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTransactionTables()
    {
        return $this->hasMany(TransactionTable::className(), ['order_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVoucherHistories()
    {
        return $this->hasMany(VoucherHistory::className(), ['order_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \common\models\query\OrderQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\OrderQuery(get_called_class());
    }
}