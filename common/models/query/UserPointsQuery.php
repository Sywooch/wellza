<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[BaseUserPoints]].
 *
 * @see BaseUserPoints
 */
class UserPointsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return BaseUserPoints[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return BaseUserPoints|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
