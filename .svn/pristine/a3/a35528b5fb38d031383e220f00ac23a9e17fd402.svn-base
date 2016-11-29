<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\MasterMembershipPlan]].
 *
 * @see \common\models\MasterMembershipPlan
 */
class MasterMembershipPlanQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \common\models\MasterMembershipPlan[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\MasterMembershipPlan|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
    
    public function byStatus($status)
    {
        $this->andWhere(['status'=>$status]);
        return $this;
    }
    
}
