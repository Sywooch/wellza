<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\base\BasePortfolio]].
 *
 * @see \common\models\base\BasePortfolio
 */
class PortfolioQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \common\models\base\BasePortfolio[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\base\BasePortfolio|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
    
    public function byId($val)
    {
        $this->andWhere('user_id = :id',[':id' => $val]);
        return $this;
    }
    
    public function byItemId($user_id = null,$val = null)
    {
        $this->andWhere('user_id = :user_id AND id = :id',[':user_id' => $user_id,':id' => $val]);
        return $this;
    }
    
    public function byMediaType($id = null,$media_type = null)
    {
        $this->andWhere('user_id = :id AND media_type = :media_type',[':id' => $id,':media_type' => $media_type]);
        return $this;
    }
}
