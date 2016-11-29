<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\base\BaseProduct]].
 *
 * @see \common\models\base\BaseProduct
 */
class ProductQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \common\models\base\BaseProduct[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\base\BaseProduct|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
    
    /**
     * @inheritdoc
     * @return \common\models\base\BaseProduct|array|null
     */
    public function byId($val = null)
    {   
        $this->where('id = :id',[':id' =>$val]);
        return $this;
    }
    
    /**
     * @inheritdoc
     * @return \common\models\base\BaseProduct|array|null
     */
    public function byCategory($category_id = null,$sub_category_id = null)
    {   
        $this->andWhere('category_id = :category_id',[':category_id' => $category_id]);
        $this->andWhere('sub_category_id = :sub_category_id',[':sub_category_id' => $sub_category_id]);
        return $this;
    }
    
    public function byStatus($status){
        $this->andWhere('status = :status',[':status' => $status]);
        return $this;
    }
}
