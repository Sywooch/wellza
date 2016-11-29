<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\CardInfo]].
 *
 * @see \common\models\CardInfo
 */
class CardInfoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \common\models\CardInfo[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\CardInfo|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
    public function byFingerprint($fingerprint)
    {
        $this->where(['fingerprint'=>$fingerprint]);
        return $this;
    }
}
