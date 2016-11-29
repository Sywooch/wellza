<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "request_service".
 *
 * @property integer $id
 * @property string $category_name
 * @property integer $provider_id
 * @property string $created_at
 * @property string $updated_at
 */
class BaseRequestService extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'request_service';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['provider_id'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['category_name'], 'string', 'max' => 80],            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_name' => 'Category Name',
            'provider_id' => 'Provider ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @inheritdoc
     * @return \common\models\query\RequestServiceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\RequestServiceQuery(get_called_class());
    }   
    
}
