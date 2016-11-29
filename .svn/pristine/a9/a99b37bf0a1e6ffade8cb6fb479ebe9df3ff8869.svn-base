<?php

namespace common\models\query;

use Yii;


class ServicesQuery extends \yii\db\ActiveQuery
{
    public function byParent($val)
    {
        $this->andWhere('parent = :parentID AND status = :status',[':parentID' => $val,':status' => 'Active']);
        return $this;
    }
    
    public function byAdminParent($val)
    {
        $this->andWhere('parent = :parentID',[':parentID' => $val]);
        return $this;
    }
    
    public function byParentCat($val)
    {
        $this->andWhere('`services`.`parent` = :parentID AND `services`.`status` = :status',[':parentID' => $val,':status' => 'Active']);
        return $this;
    }
    
    public function byParents($val)
    {
        $this->andWhere('`services`.`parent` = :parentID AND `services`.`status` = :status',[':parentID' => $val,':status' => 'Active']);
        return $this;
    }
    
    public function byCategory($val = null,$status = null)
    {   
        $this->andWhere('category_id = :category_id AND status = :status',[':category_id' => $val,':status' => $status]);
        return $this;
    }
    
    public function bySubCategory($val = null,$status = null)
    {   
        $this->andWhere('`services`.`category_id` = :category_id AND `services`.`status` = :status',[':category_id' => $val,':status' => $status]);
        return $this;
    }
    
    public function byID($val = null)
    {   
        $this->where('category_id = :category_id',[':category_id' => $val]);
        return $this;
    }
    
    public function byName($val = null)
    {   
        $this->where('category_name = :category_name',[':category_name' => $val]);
        return $this;
    }
    
    public function bySearch($val = null,$parent = null)
    {   
        $this->where('category_name LIKE :category_name AND parent = :parent',[':category_name' => "%{$val}%",':parent' => $parent]);
        return $this;
    }
    
    public function bySubSearch($val = null,$parent = null)
    {   
        $this->where('category_name LIKE :category_name AND parent != :parent',[':category_name' => "%{$val}%",':parent' => 0]);
        return $this;
    }
    
    public function byAdminSubCategory()
    {   
        $this->where('parent !=:parent',[':parent' => 0]);
        return $this;
    }  
}
