<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "master_cities".
 *
 * @property integer $city_id
 * @property string $city_name
 * @property string $state_id
 * @property string $country_id
 */
class MasterCities extends base\BaseMasterCities
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
     * @return \common\models\query\MasterCitiesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\MasterCitiesQuery(get_called_class());
    }    
    
    /**
     * Get list of all the provinces
     * @return province|Null
     */
    public static function getCities($country_id = null) {
        return self::find()->ByCountry($country_id)->all();
    }
    
    /**
     * Get list of cities of a particular provinces
     * @return City|Null
     */
    public static function getCitiesByProvince($province_id = null) {
        return self::find()->ByProvince($province_id)->asArray()->all();
    }
    
    /**
     * Search a particular cities
     * @return cities|Null
     */
    public static function searchCities($city = null) {
        $city_name = array();
        
        $city_arra = self::find()->select('city_name')
                //->where(['like', 'city_name', $city])
                //->andWhere('country_id =:countries_id',[':countries_id' => 'CA'])->all();
                ->where('city_name LIKE :city')
                ->addParams([':city'=> "{$city}%"])
                ->andWhere('country_id =:countries_id',[':countries_id' => 'CA'])->all();
        
        if(!empty($city_arra)) {
            foreach ($city_arra as $city) {
                $city_name[] = $city->city_name;
            }
            
            return $city_name;
        } else {
            return null;
        }        
    }
    
    /**
     * Get list of cities of a particular provinces
     * @return City|Null
     */
    public static function getCitiesByName($city_id = null) {
        return self::find()->ByCityID($city_id)->one();
    }
}
