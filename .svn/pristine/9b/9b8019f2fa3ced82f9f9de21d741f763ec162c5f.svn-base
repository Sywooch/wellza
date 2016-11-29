<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property string $product_name
 * @property integer $quantity
 * @property double $weight
 * @property string $price
 * @property string $selling_price
 * @property integer $manufacture_id
 * @property integer $category_id
 * @property integer $sub_category_id
 * @property string $sr_number
 * @property string $short_description
 * @property string $long_description
 * @property integer $viewed
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Cart[] $carts
 * @property OrderDetail[] $orderDetails
 * @property Services $category
 * @property Services $subCategory
 * @property ProductImage[] $productImages
 */
class BaseProduct extends \yii\db\ActiveRecord
{
    public $main_category;
    public $sub_category;
    public $product_image;
 
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['main_category', 'sub_category'], 'trim'],
            [['quantity', 'manufacture_id', 'category_id', 'sub_category_id', 'viewed'], 'integer'],
            [['weight', 'price', 'selling_price'], 'number'],
            [['long_description', 'status'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['product_name', 'short_description'], 'string', 'max' => 200],
            [['sr_number'], 'string', 'max' => 100],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\Services::className(), 'targetAttribute' => ['category_id' => 'category_id']],
            [['sub_category_id'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\Services::className(), 'targetAttribute' => ['sub_category_id' => 'category_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_name' => 'Product Name',
            'quantity' => 'Quantity',
            'weight' => 'Weight',
            'price' => 'Price',
            'selling_price' => 'Selling Price',
            'manufacture_id' => 'Manufacture ID',
            'category_id' => 'Category ID',
            'sub_category_id' => 'Sub Category ID',
            'sr_number' => 'Sr Number',
            'short_description' => 'Short Description',
            'long_description' => 'Long Description',
            'viewed' => 'Viewed',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCarts()
    {
        return $this->hasMany(\common\models\Cart::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderDetails()
    {
        return $this->hasMany(\common\models\OrderDetail::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(\common\models\Services::className(), ['category_id' => 'category_id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServices()
    {
        return $this->hasOne(\common\models\Services::className(), ['category_id' => 'category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSubCategory()
    {
        return $this->hasOne(\common\models\Services::className(), ['category_id' => 'sub_category_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductImages()
    {
        return $this->hasMany(BaseProductImage::className(), ['product_id' => 'id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductImage()
    {
        return $this->hasMany(\common\models\ProductImage::className(), ['product_id' => 'id']);
    }
}
