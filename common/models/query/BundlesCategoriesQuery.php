<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\base\BaseBundlesCategories]].
 *
 * @see \common\models\base\BaseBundlesCategories
 */
class BundlesCategoriesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \common\models\base\BaseBundlesCategories[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\base\BaseBundlesCategories|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
    
    /**
     * @inheritdoc
     * @return \common\models\base\BaseBundlesCategories|array|null
     */
    public function byBundleId($bundle_id = null)
    {        
        $this->where('bundle_id = :bundle_id',[':bundle_id' => $bundle_id]);
        return $this;
    }
    /**
     * @inheritdoc
     * @return \common\models\base\BaseBundlesCategories|array|null
     */
    public function bySubSearch($bundle_id = null,$search_string = null)
    {        
        $this->where('bundle_categories.bundle_id = :bundle_id AND services.category_name LIKE :category_name',[':bundle_id' => $bundle_id,':category_name' => "%{$search_string}%"]);
        return $this;
    }
    
}
