<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "icon_class".
 *
 * @property integer $id
 * @property string $class_name
 *
 * @property Services[] $services
 */
class BaseIconClass extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'icon_class';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['class_name'], 'required'],
            [['class_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'class_name' => 'Class Name',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getServices()
    {
        return $this->hasMany(Services::className(), ['icon_id' => 'id']);
    }
}
