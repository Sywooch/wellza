<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "icon_class".
 *
 * @property integer $id
 * @property string $class_name
 *
 * @property Services[] $services
 */
class IconClass extends base\BaseIconClass
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
    public function rules() {
        return ArrayHelper::merge(
            parent::rules(),
            [
                       
            ]);
    }
    
    /**
     * @inheritdoc
     */   
    public function attributeLabels() {
        return ArrayHelper::merge(
            parent::attributeLabels(),
            [
                    
            ]);
    }
        
    /**
     * @inheritdoc
     * @return \common\models\query\IconClassQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\IconClassQuery(get_called_class());
    }
    
    /**
     * @inheritdoc
     * @return Icons|Null
     */
    public static function getAllIconClass($icon_type = null)
    {
        return self::find()->select('class_name')->ByType($icon_type)->asArray()->all();
    }
    /**
     * @inheritdoc
     * @return Icons|Null
     */
    public static function getIconID($class_name = null)
    {
        return self::find()->ByName($class_name)->asArray()->all();       
        
    }
    
    /**
     * @inheritdoc
     * @return Icons|Null
     */
    public static function getIconByID($icon_id = null)
    {
        return self::find()->select('class_name')->ById($icon_id)->asArray()->one();       
        
    }
    /**
     * @inheritdoc
     * @return Icons|Null
     */
    public static function getIconClass($icon_id = null)
    {
        $iconClass =  self::find()->select('class_name')->ById($icon_id)->asArray()->one();  
        if(!empty($iconClass)) {
            return $iconClass['class_name'];
        } else {
            return null;
        }
        
    }
    
}
