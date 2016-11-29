<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\base\BasePackages]].
 *
 * @see \common\models\base\BasePackages
 */
class PackagesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \common\models\base\BasePackages[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\base\BasePackages|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
    
    /**
     * @inheritdoc
     * @return \common\models\base\BasePackages|array|null
     */
    public function byServiceId($service_id = null,$status = null,$on_date = null)
    {   $this->andWhere('service_id = :service_id AND status = :status AND available_date = :available_date AND parent != :parent',[':service_id' => $service_id,':status' => $status,':available_date' => $on_date,':parent' => 0 ]);
        return $this;
    }
    
    /**
     * @inheritdoc
     * @return \common\models\base\BasePackages|array|null
     */
    public function byPreparationStatus($category_id = null,$subcategory_id = null)
    {   $this->where('parent = :parent AND service_id = :service_id AND status = :status',[':parent' => $category_id,':service_id' => $subcategory_id,':status' => 'Active']);
        return $this;
    }
   
    /**
     * @inheritdoc
     * @return \common\models\base\BasePackages|array|null
     */
    public function byID($category_id = null)
    {   $this->where('service_id = :service_id',[':service_id' => $category_id]);
        return $this;
    }
    
    public function byStatus($status){
        $this->andWhere(['status'=>$status]);
        return $this;
    }
    public function bySubServiceId($subServiceId){
        $this->andWhere(['service_id'=>$subServiceId]);
        return $this;
    }
    public function byParentId($parentId){
        $this->andWhere(['parent'=>$parentId]);
        return $this;
    }
    public function byPackageId($packageId){
        $this->andWhere(['package_id'=>$packageId]);
        return $this;
    }
    /**
     * @inheritdoc
     * @return \common\models\base\BasePackages|array|null
     */
    public function byPackage($packageId = null){
        $this->where('package_id = :package_id',[':package_id'=>$packageId]);
        return $this;
    }

}
