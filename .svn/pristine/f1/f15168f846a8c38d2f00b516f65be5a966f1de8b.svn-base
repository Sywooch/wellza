<?php
/* * ********************************************************************************************************************* *//**
 *  Model Name: BundlesCategories.php
 *  Created: Codian Team
 *  Description: Manages the crud operations for bundles categories.It inherits the properties
 *  of the base class rules and attribute labels. 
 * ************************************************************************************************************************* */
namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
/**
 * This is the model class for table "bundle_categories".
 *
 * @property integer $id
 * @property integer $category_id
 * @property integer $bundle_id
 *
 * @property Bundles $bundle
 * @property Services $category
 */
class BundlesCategories extends base\BaseBundlesCategories
{
    public function rules() {
        return ArrayHelper::merge(
                        parent::rules(), [                    
        ]);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return ArrayHelper::merge(
                        parent::attributeLabels(), [
        ]);
    }
    
    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'attributes' => [
                    \yii\db\ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    \yii\db\ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value' => new Expression('NOW()'),
            ],
        ];
    }
    /**
     * Fields
     */
    public function fields() {
        return ArrayHelper::merge(parent::fields(), [
            'category_name'=>function($model){
                return $model->category->category_name;
            },
            'class_name'=>function($model){
                $iconClass =  IconClass::getIconByID($model->category->id);
                return !empty($iconClass['class_name'])?$iconClass['class_name']:'';
            },
            'category_image'=>function($model){
                $image =  $model->category->category_image;
                $url = \yii\helpers\Url::to('@web', true);
                if (!empty($image) && file_exists('../../backend/web/' . $image)) {
                    return $url .'/'. $image;
                }
            }
        ]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBundle()
    {
        return $this->hasOne(Bundles::className(), ['bundle_id' => 'bundle_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Services::className(), ['category_id' => 'category_id']);
    }
    
    /**
     * @inheritdoc
     * @return \common\models\query\BundlesCategoriesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\BundlesCategoriesQuery(get_called_class());
    }
    
    /**
     * get selected services data for a bundle
     * @param type bundle_id
     * @return type Categories|Null
     */
    public static function getSelectedCategories($bundle_id = null) {
        
        $result = self::find()->select('category_id')->ByBundleId($bundle_id)->asArray()->all();       
        
        if(!empty($result)) {
            return $result;
        } else {
            return null;
        }       
    }
    
    /**
     * Get all the data of categories their images etc
     * @param type null
     * @return type Categories|Null
     */
    public static function getCategoriesData() {
        $returndata = array();
        $bundles_data = Bundles::getAllBundle();
        if(!empty($bundles_data)) {
            $i=0;
            foreach ($bundles_data as $data) {
                $returndata[$i]['bundle']['bundle_id'] = $data->bundle_id;
                $returndata[$i]['bundle']['bundle_name'] = $data->bundle_name;
                $returndata[$i]['bundle']['savings'] = $data->savings;
                $returndata[$i]['bundle']['price'] = $data->price;
                $returndata[$i]['bundle']['status'] = $data->status;
                $bundle_categories = self::find()->ByBundleId($data->bundle_id)->all();
                if(!empty($bundle_categories)) {
                    $j=0;
                    foreach($bundle_categories as $bundle_data) {
                        
                        $returndata[$i]['bundle'][$j]['categories']['category_id'] = $bundle_data->category_id;
                        $returndata[$i]['bundle'][$j]['categories']['category_name'] = $bundle_data->category->category_name;
                        $returndata[$i]['bundle'][$j]['categories']['category_image'] = $bundle_data->category->category_image;
                    
                        $j++;
                    }
                }
                $i++;
                
            }            
        }
        
        return null;
    }
    
    /**
     * Get all the subcategories of a particular category
     *
     * @return Subcategories|Null
     */
    public static function adminGetAllSubCategoies($bundle_id = null, $search = null) {
        $returndata = [];
        $sort = self::setSortData();
        $query = '';
        if (!empty($search)) {
            $query = self::find();                        
            $query->join('join', 'services', 'services.category_id = bundle_categories.category_id');
            $query->bySubSearch($bundle_id,$search);
        } else {
            $query = self::find()->ByBundleId($bundle_id);
            $query->join('join', 'services', 'services.category_id = bundle_categories.category_id');
            
            /*$bundle_data = self::find()->ByBundleId($bundle_id)->all();
            
            if(!empty($bundle_data)) {
                foreach ($bundle_data as $result) {
                   $returndata[] = Services::find()->ByCategory($result->category_id,'Active')->one();
                   //echo '<pre/>';print_r($returndata);die('...');
                }
            }
            
            $dataProvider = new \yii\data\ActiveDataProvider([
                'query' => self::find()->ByBundleId($bundle_id),
                'pagination' => [
                    'pageSize' => 20,
                ],
            ]);
            $dataProvider->setModels($returndata);*/
        }
        $query->orderBy($sort->orders);
        $dataProvider = new \yii\data\ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 20,
            ],
            'sort' => self::setSortData()
        ]);
               
        return $dataProvider;
    }
    
    /**
     * To set the data for sorting
     *
     * @return sort
     */
    public static function setSortData() {
        $sort = new \yii\data\Sort([
            'defaultOrder' => ['bundle_categories.updated_at' => SORT_DESC],
            'attributes' => [
                'bundle_categories.updated_at',
                'services.category_name' => [
                    'asc' => ['services.category_name' => SORT_ASC],
                    'desc' => ['services.category_name' => SORT_DESC],
                    'label' => 'CATEGORIES',
                    'default' => SORT_DESC
                ]
                
            ]
            
        ]);
       
        return $sort;
    }
    
}
/* * ********************************************************************************************************************************** */
// EOF: BundlesCategories.php
/* * ********************************************************************************************************************************** */
