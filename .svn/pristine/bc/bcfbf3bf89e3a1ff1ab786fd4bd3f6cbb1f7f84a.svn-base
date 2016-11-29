<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "master_cities".
 *
 * @property integer $city_id
 * @property string $city_name
 * @property string $state_id
 * @property string $country_id
 */
class BaseMasterCities extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'master_cities';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['city_name', 'state_id', 'country_id'], 'required'],
            [['city_name'], 'string', 'max' => 80],
            [['state_id', 'country_id'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'city_id' => 'City ID',
            'city_name' => 'City Name',
            'state_id' => 'State ID',
            'country_id' => 'Country ID',
        ];
    }    
}
