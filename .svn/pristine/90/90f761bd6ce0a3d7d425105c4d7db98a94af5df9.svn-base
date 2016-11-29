<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "order_detail".
 *
 * @property integer $id
 * @property integer $order_id
 * @property integer $product_id
 * @property string $product_name
 * @property string $price
 * @property integer $quantity
 * @property string $email
 * @property string $phone
 * @property string $shipping_first_name
 * @property string $shipping_last_name
 * @property string $shipping_address1
 * @property string $shipping_address2
 * @property string $city
 * @property string $zip
 * @property string $country
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Product $product
 * @property Order $order
 */
class BaseOrderDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'product_id', 'quantity'], 'integer'],
            [['price'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['product_name'], 'string', 'max' => 150],
            [['email'], 'string', 'max' => 250],
            [['phone'], 'string', 'max' => 20],
            [['shipping_first_name', 'shipping_last_name'], 'string', 'max' => 80],
            [['shipping_address1', 'shipping_address2'], 'string', 'max' => 200],
            [['city', 'country'], 'string', 'max' => 100],
            [['zip'], 'string', 'max' => 10],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Order::className(), 'targetAttribute' => ['order_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => 'Order ID',
            'product_id' => 'Product ID',
            'product_name' => 'Product Name',
            'price' => 'Price',
            'quantity' => 'Quantity',
            'email' => 'Email',
            'phone' => 'Phone',
            'shipping_first_name' => 'Shipping First Name',
            'shipping_last_name' => 'Shipping Last Name',
            'shipping_address1' => 'Shipping Address1',
            'shipping_address2' => 'Shipping Address2',
            'city' => 'City',
            'zip' => 'Zip',
            'country' => 'Country',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Order::className(), ['id' => 'order_id']);
    }

    /**
     * @inheritdoc
     * @return \common\models\query\OrderDetailQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\OrderDetailQuery(get_called_class());
    }
}
