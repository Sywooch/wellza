<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\base\BaseProductImage]].
 *
 * @see \common\models\base\BaseProductImage
 */
class ProductImageQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \common\models\base\BaseProductImage[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\base\BaseProductImage|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
    
    public function byProductId($val = null)
    {   
        $this->where('product_id = :product_id',[':product_id' =>$val]);
        return $this;
    }
    
    public function isCover($val){
        $this->andWhere('is_cover = :is_cover',[':is_cover' => $val]);
        return $this;
    }
}
