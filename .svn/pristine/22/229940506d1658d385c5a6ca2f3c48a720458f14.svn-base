<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "bundle_categories".
 *
 * @property integer $id
 * @property integer $category_id
 * @property integer $bundle_id
 *
 * @property Bundles $bundle
 * @property Services $category
 */
class BaseBundlesCategories extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'bundle_categories';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'bundle_id'], 'integer'],
            [['bundle_id'], 'exist', 'skipOnError' => true, 'targetClass' => Bundles::className(), 'targetAttribute' => ['bundle_id' => 'bundle_id']],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Services::className(), 'targetAttribute' => ['category_id' => 'category_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'bundle_id' => 'Bundle ID',
        ];
    }    
}
