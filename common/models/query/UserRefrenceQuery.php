<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[UserRefrence]].
 *
 * @see UserRefrence
 */
class UserRefrenceQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return UserRefrence[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return UserRefrence|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
