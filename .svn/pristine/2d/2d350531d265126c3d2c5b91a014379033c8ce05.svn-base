<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\MasterStates]].
 *
 * @see \common\models\MasterStates
 */
class MasterStatesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \common\models\MasterStates[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\MasterStates|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
    
    /**
     * @inheritdoc
     * @return \common\models\MasterStates|array|null
     */
    public function byCountry($val = null)
    {   $this->where('countries_id = :countries_id',[':countries_id' => $val]);
        return $this;
    }
    
    /**
     * @inheritdoc
     * @return \common\models\MasterStates|array|null
     */
    public function byProvinceCode($val = null)
    {   $this->where('state_abbrev = :state_abbrev',[':state_abbrev' => $val]);
        return $this;
    }
}
