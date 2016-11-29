<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\base\BaseReviewRating]].
 *
 * @see \common\models\base\BaseReviewRating
 */
class ReviewRatingQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \common\models\base\BaseReviewRating[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\base\BaseReviewRating|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
    
    /**
     * @inheritdoc
     * @return \common\models\base\BaseReviewRating|array|null
     */
    public function ByIDNRating($provider_id = null,$rating_given_by = null)
    {
        $this->where('provided_to = :provided_to AND rating_given_by = :rating_given_by',[':provided_to' => $provider_id,':rating_given_by' => "{$rating_given_by}"]);
        return $this;
    }
    
    /**
     * @inheritdoc
     * @return \common\models\base\BaseReviewRating|array|null
     */
    public function ByIDNRatingClient($client_id = null,$rating_given_by = null)
    {
        $this->where('provided_to = :provided_to AND rating_given_by = :rating_given_by',[':provided_to' => $client_id,':rating_given_by' => "{$rating_given_by}"]);
        return $this;
    }
    
}