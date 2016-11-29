<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "master_countries".
 *
 * @property integer $countries_id
 * @property string $countries_name
 * @property string $countries_iso_code_2
 * @property string $countries_iso_code_3
 * @property integer $address_format_id
 */
class MasterCountries extends base\BaseMasterCountries
{    
    public function rules() {
        return ArrayHelper::merge(
            parent::rules(),
            [
                    
                ]);
    }
       
    public function attributeLabels() {
        return ArrayHelper::merge(
            parent::attributeLabels(),
            [
                    
                ]);
    }
    
    /**
     * @inheritdoc
     * @return \common\models\query\MasterCountriesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\MasterCountriesQuery(get_called_class());
    }
}
