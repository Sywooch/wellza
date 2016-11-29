<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\base\BaseMasterCities]].
 *
 * @see \common\models\base\BaseMasterCities
 */
class MasterCitiesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \common\models\base\BaseMasterCities[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\base\BaseMasterCities|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
    
    public function byCountry($val = null)
    {   $this->where('country_id = :country_id',[':country_id' => $val]);
        return $this;
    }
    
    public function byProvince($val = null)
    {   $this->where('state_id =:state_id AND country_id = :country_id',['state_id' => $val,':country_id' => 'CA']);
        return $this;
    }
    
    public function byCityID($val = null)
    {   $this->where('city_id =:city_id',['city_id' => $val]);
        return $this;
    }   
}
