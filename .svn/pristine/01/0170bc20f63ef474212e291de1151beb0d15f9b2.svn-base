<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "bundles".
 *
 * @property integer $bundle_id
 * @property string $bundle_name
 * @property integer $savings
 * @property string $price
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 *
 * @property BundleCategories[] $bundleCategories
 */
class BaseBundles extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bundles';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['savings'], 'integer'],
            [['price'], 'number'],
            [['status'], 'string'],
            [['parent'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['bundle_name'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'bundle_id' => 'Bundle ID',
            'bundle_name' => 'Bundle Name',
            'savings' => 'Savings',
            'price' => 'Price',
            'status' => 'Status',
            'parent' => 'Parent',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
    
}
