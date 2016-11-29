<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\base\BaseGiftVoucher]].
 *
 * @see \common\models\base\BaseGiftVoucher
 */
class GiftVoucherQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \common\models\base\BaseGiftVoucher[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\base\BaseGiftVoucher|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
    
    /**
     * @inheritdoc
     * @return \common\models\base\BaseGiftVoucher|array|null
     */
    public function byId($id = null)
    {
        $this->where('id = :id',[':id' => $id]);
        return $this;
    }
}
