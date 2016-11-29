<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\base\FavouriteList]].
 *
 * @see \common\models\base\FavouriteList
 */
class FavouriteListQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \common\models\base\FavouriteList[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\base\FavouriteList|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
    
    /**
     * @inheritdoc
     * @return \common\models\base\FavouriteList|array|null
     */
    public function byProviderId($provider_id = null)
    {   $this->andWhere('provider_id = :provider_id',[':provider_id' => $provider_id]);
        return $this;
    }
    /**
     * 
     * @param type $userId
     * @return \common\models\query\FavouriteListQuery
     */
    public function byUserId($userId)
    {   $this->andWhere('user_id = :user_id',[':user_id' => $userId]);
        return $this;
    }
    
    public function byStatus($status)
    {   $this->andWhere('status = :status',[':status' => $status]);
        return $this;
    }
    
}
