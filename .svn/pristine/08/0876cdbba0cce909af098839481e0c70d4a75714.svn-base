<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\base\BaseIconClass]].
 *
 * @see \common\models\base\BaseIconClass
 */
class IconClassQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \common\models\base\BaseIconClass[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\base\BaseIconClass|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
    
    /**
     * @inheritdoc
     * @return \common\models\base\BaseIconClass|array|null
     */
    public function byName($val = null)
    {   
        $this->where('class_name = :class_name',[':class_name' => $val]);
        return $this;        
    }
    /**
     * @inheritdoc
     * @return \common\models\base\BaseIconClass|array|null
     */
    public function byType($val = null)
    {   
        $this->where('icon_type = :icon_type',[':icon_type' => $val]);
        return $this;        
    }
    /**
     * @inheritdoc
     * @return \common\models\base\BaseIconClass|array|null
     */
    public function byId($val = null)
    {   
        $this->where('id = :id',[':id' => $val]);
        return $this;        
    }
}
