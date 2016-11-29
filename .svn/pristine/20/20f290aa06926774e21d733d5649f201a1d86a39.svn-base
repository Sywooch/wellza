<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "master_states".
 *
 * @property integer $state_id
 * @property string $state_name
 * @property string $state_abbrev
 * @property string $countries_id
 */
class MasterStates extends base\BaseMasterStates
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
     * @return \common\models\query\MasterStatesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\MasterStatesQuery(get_called_class());
    }
    
    /**
     * Get list of all the provinces
     * @return province|Null
     */
    public static function getProvince($country_id = null) {
        return self::find()->ByCountry($country_id)->all();
    }
    
    /**
     * Search a particular province
     * @return province|Null
     */
    public static function searchProvince($province = null) {
        $state_name = array();
        
        $state_arra = self::find()->select('state_name')
                //->where(['like', 'state_name', $province])
                //->andWhere('countries_id =:countries_id',[':countries_id' => 'CA'])->all();
                ->where('state_name LIKE :state')
                ->addParams([':state'=> "{$province}%"])
                ->andWhere('countries_id =:countries_id',[':countries_id' => 'CA'])->all();
        
        if(!empty($state_arra)) {
            foreach ($state_arra as $state) {
                $state_name[] = $state->state_name;
            }
            
            return $state_name;
        } else {
            return null;
        }        
    }
    
    /**
     * Get list of all the provinces
     * @return province|Null
     */
    public static function getProvinceName($province_code = null) {
        return self::find()->byProvinceCode($province_code)->one();
    }
}
