<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\base\BaseCart]].
 *
 * @see \common\models\base\BaseCart
 */
class CartQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \common\models\base\BaseCart[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\base\BaseCart|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
    /**
     * By customer ID
     * @param type $customerId
     * @return \common\models\query\CartQuery
     */
    public function byCustomerId($customerId){
        $this->andWhere('customer_id = :customer_id',[':customer_id' => $customerId]);
        return $this;
    }
    
    /**
     * By type_id i.e. if item is product type then type_id Must be product id
     * @param type $typeId
     * @return \common\models\query\CartQuery
     */
    public function byTypeId($typeId){
        $this->andWhere('type_id = :type_id',[':type_id' => $typeId]);
        return $this;
    }
    /**
     * BY type of item i.e. appointment,product e.t.c
     * @param type $type
     * @return \common\models\query\CartQuery
     */
    public function byType($type){
        $this->andWhere('type = :type',[':type' => $type]);
        return $this;
    }
    /**
     * By item id
     * @param type $id
     * @return \common\models\query\CartQuery
     */
    public function byId($id){
        $this->andWhere('id = :id',[':id' => $id]);
        return $this;
    }
}
