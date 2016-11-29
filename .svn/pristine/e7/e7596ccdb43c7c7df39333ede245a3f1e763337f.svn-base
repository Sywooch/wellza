<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\base\BaseCoupon]].
 *
 * @see \common\models\base\BaseCoupon
 */
class CouponQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \common\models\base\BaseCoupon[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\base\BaseCoupon|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
    
    /**
     * @inheritdoc
     * @return \common\models\base\BaseCoupon|array|null
     */
    public function ById($id = null)
    {
        $this->where('id = :id',[':id' => $id]);
        return $this;;
    }
}
