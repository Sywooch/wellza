<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\base\BaseProviderServices]].
 *
 * @see \common\models\base\BaseProviderServices
 */
class ProviderServicesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \common\models\base\BaseProviderServices[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\base\BaseProviderServices|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
    
    /**
     * @inheritdoc
     * @return \common\models\base\BaseProviderServices|array|null
     */
    public function byID($val = null)
    {
        $this->andWhere('provider_id = :provider_id AND status = :status',[':provider_id' => $val,':status' => 'Active']);
        return $this;
    }
    
    /**
     * @inheritdoc
     * @return \common\models\base\BaseProviderServices|array|null
     */
    public function byCategorySubcategory($provider_id = null,$service_id = null,$sub_service_id = null)
    {
        $this->andWhere('provider_id = :provider_id AND service_id = :service_id AND sub_service_id = :sub_service_id AND status = :status',[':provider_id' => $provider_id,':service_id' => $service_id,':sub_service_id' => $sub_service_id,':status' => 'Active']);
        return $this;
    }
  
}
