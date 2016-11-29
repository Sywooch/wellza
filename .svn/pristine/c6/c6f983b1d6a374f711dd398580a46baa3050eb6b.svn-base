<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\base\BaseAvailability]].
 *
 * @see \common\models\base\BaseAvailability
 */
class AvailabilityQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \common\models\base\BaseAvailability[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\base\BaseAvailability|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
    
    /**
     * @inheritdoc
     * @return \common\models\base\BaseAvailability|array|null
     */
    public function byDate($val = null)
    {
        $this->where('on_date = :ondate',[':ondate'=>$val]);
        return $this;
    }
    
    /**
     * @inheritdoc
     * @return \common\models\base\BaseAvailability|array|null
     */
    public function byId($val = null)
    {
        $this->where('id = :id',[':id'=>$val]);
        return $this;
    }
    
    /**
     * @inheritdoc
     * @return \common\models\base\BaseAvailability|array|null
     */
    public function byEventNUserID($slot_id = null,$user_id = null)
    {
        $this->where('id = :id AND user_id = :user_id',[':id'=>$slot_id,':user_id' => $user_id]);
        return $this;
    }
    
    /**
     * @inheritdoc
     * @return \common\models\base\BaseAvailability|array|null
     */
    public function byUserId($id = null)
    {
        $this->where('user_id = :user_id',[':user_id'=>$id]);
        return $this;
    }
}
