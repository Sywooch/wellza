<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "product_image".
 *
 * @property integer $id
 * @property integer $product_id
 * @property string $product_image
 * @property integer $is_cover
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Product $product
 */
class BaseProductImage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product_image';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'is_cover'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['product_image'], 'string', 'max' => 250],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'product_image' => 'Product Image',
            'is_cover' => 'Is Cover',
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
     * @inheritdoc
     */
    public function fields() {
        return array_merge(parent::fields(), [
            'product_image' =>function($model){
                $url = \Yii::$app->urlManagerBackend->baseurl;
                if (!empty($model->product_image) && file_exists('../../backend/web/' . $model->product_image)) {
                    return $url . $model->product_image;
                } else {
                    return $url . '/uploads/products/default-product-image.png';
                }
            }
        ]);
    }
}
