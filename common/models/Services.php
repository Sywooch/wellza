<?php

namespace common\models;

use Yii;
use common\models\base\BaseServices;
use common\models\query\ServicesQuery;
use common\models\query;
use yii\helpers\ArrayHelper;
use common\models\Authtoken;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
use common\models\IconClass;
use  yii\web\Session;

class Services extends BaseServices {
       
    /************************************************** Custom Calender Variables ********************************************** */

    private $dayLabels = array("MONDAY", "TUESDAY", "WEDNESDAY", "THURSDAY", "FRIDAY", "SATURDAY", "SUNDAY");
    private $currentYear = 0;
    private $currentMonth = 0;
    private $currentDay = 0;
    private $currentDate = null;
    private $daysInMonth = 0;
    private $naviHref = null;
    private $year = null;
    private $month = null;

    /******************************************************************************************************************************** */

    /**
     * @inheritdoc
     */
    public function rules() {
        return ArrayHelper::merge(
                        parent::rules(), [
                    [['sub_category_id', 'latitude', 'longitude'], 'required', 'on' => ['allproviders', 'prepstatus']],
                    [['sub_category_id'], 'integer', 'on' => ['allproviders', 'prepstatus']],
                    //['category_name', 'required', 'on' => 'addcategory'],        
                    [['sub_category_id'], 'compare', 'compareValue' => 0, 'operator' => '>', 'message' => 'sub_category_id is not valid', 'on' => 'allproviders']
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

    public function scenarios() {
        $scenarios = parent::scenarios();
        $scenarios['allproviders'] = ['category_id', 'sub_category_id', 'latitude', 'longitude'];
        $scenarios['prepstatus'] = ['category_id', 'sub_category_id'];
        //$scenarios['addcategory'] = ['category_name'];

        return $scenarios;
    }

    public static function find() {
        return new query\ServicesQuery(get_called_class());
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
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * To get the list of all Parent Services
     */
    public static function getServices() {
        $servicedata = self::find()->select('category_id,category_name,description,category_image,icon_id')->ByParent(0)->asArray()->all();
        if (!empty($servicedata)) {
            $url = \yii\helpers\Url::to('@web', true);

            for ($i = 0; $i < count($servicedata); $i++) {
                $image = $servicedata[$i]['category_image'];
                $servicedata[$i]['category_image'] = !empty($image) ? $url . '/' . $image : NULL;
                $servicedata[$i]['category_image_selected'] = !empty($image) ? $url . '/' . $image : NULL;
                $servicedata[$i]['class'] = IconClass::getIconClass($servicedata[$i]['icon_id']);
                if (!empty($servicedata[$i]['category_image_selected'])) {
                    $servicedata[$i]['category_image_selected'] = str_replace('images', 'images/selected', $servicedata[$i]['category_image_selected']);
                }
                //$servicedata[$i]['category_image_3x'] = !empty($servicedata[$i]['category_image_3x']) ? $url . $servicedata[$i]['category_image_3x'] : NULL;
                //$servicedata[$i]['category_thumbnail'] =  !empty($servicedata[$i]['category_thumbnail']) ? $url . $servicedata[$i]['category_thumbnail'] : NULL;
                //$servicedata[$i]['banner'] = !empty($servicedata[$i]['banner']) ? $url . $servicedata[$i]['banner'] : NULL;
            }
            return $servicedata;
        } else {
            return false;
        }
    }

    /**
     * To get the list of all Sub Services
     */
    public function getBySubServices($cat_id = null) {
        $category_id = !(empty($cat_id)) ? $cat_id : $this->category_id;
        
        $servicedata = self::find()->select('category_id,category_name,description,category_thumbnail,banner,banner_type,icon_id,parent,video_thumbnail')->ByParent($category_id)->asArray()->all();
        if ($servicedata) {
            $url = \yii\helpers\Url::to('@web', true);
            $backendUrl = Yii::$app->urlManagerBackend->baseUrl;

            for ($i = 0; $i < count($servicedata); $i++) {


                $image = $servicedata[$i]['category_thumbnail'];
                $servicedata[$i]['category_thumbnail'] = !empty($image) ? $url . '/' . $image : NULL;
                $servicedata[$i]['category_thumbnail_selected'] = !empty($image) ? $url . '/' . $image : NULL;
                if (!empty($servicedata[$i]['category_thumbnail_selected'])) {
                    $servicedata[$i]['category_thumbnail_selected'] = str_replace('images', 'images/selected', $servicedata[$i]['category_thumbnail_selected']);
                }
                $servicedata[$i]['class'] = IconClass::getIconClass($servicedata[$i]['icon_id']);
                $servicedata[$i]['banner'] = !empty($servicedata[$i]['banner']) ? $backendUrl . $servicedata[$i]['banner'] : NULL;
                $servicedata[$i]['video_thumbnail'] = !empty($servicedata[$i]['video_thumbnail']) ? $backendUrl . $servicedata[$i]['video_thumbnail'] : NULL;
                $servicedata[$i]['banner_type'] = !empty($servicedata[$i]['banner_type']) ? $servicedata[$i]['banner_type'] : NULL;
                $servicedata[$i]['parent_category_name'] = self::getParentCatName($servicedata[$i]['parent']);
            }
            return $servicedata;
        } else {
            return false;
        }
    }

    /**
     * Get first category
     */
    public static function getFirstCategorySubServices() {
        return self::find()->select('category_id')->ByParent(0)->orderBy(['category_id' => SORT_ASC])->one();
    }

    /**
     * To get the list of all Parent Services
     */
    public static function getAllServices() {
        //$sort = self::setSortData();
        //$query = self::find();
        $url = \yii\helpers\Url::to('@web', true);
        /*
          if(!empty($search)) {
          $query->orFilterWhere(['like','category_name' , $search]);
          $query->orderBy($sort->orders);
          return $query;
          } */
        $access_token = Yii::$app->request->getHeaders()->get('access-token');
        $auth = Authtoken::findIdentityByAccessToken($access_token);

        $data = self::find()
                        ->select('`services`.`category_id`,`services`.`category_name`,`services`.`category_image`,`services`.`description`,,(CASE WHEN (`provider_services`.`service_id` = `services`.`category_id` OR `provider_services`.`sub_service_id` = `services`.`category_id`) THEN "true" ELSE "false" END) as is_selected')
                        ->leftJoin('provider_services', '(`provider_services`.`service_id` = `services`.`category_id` OR `provider_services`.`sub_service_id` = `services`.`category_id`)')
                        ->ByParents(0)->asArray()->all();
        $dataarray = array();
        $service_id['category_id'] = array();
        $sub_service_id['sub_category_id'] = array();
        $tempcat = '';
        $tempsubcat = '';

        if (!empty($data)) {
            $j = 0;
            $k = 0;

            for ($i = 0; $i < count($data); $i++) {
                $service_id['category_id'] = $data[$i]['category_id'];

                $service_id['category_name'] = $data[$i]['category_name'];
                $service_id['category_image'] = !empty($data[$i]['category_image']) ? $url .'/'. $data[$i]['category_image'] : NULL;
                //$service_id['category_image_3x'] = !empty($data[$i]['category_image_3x']) ? $url . $data[$i]['category_image_3x'] : NULL;
                //$service_id['category_thumbnail'] = !empty($data[$i]['category_thumbnail']) ? $url . $data[$i]['category_thumbnail'] : NULL;
                //$service_id['banner'] = !empty($data[$i]['banner']) ? $url . $data[$i]['banner'] : NULL;
                //$service_id['banner_type'] = !empty($data[$i]['banner_type']) ? $url . $data[$i]['banner_type'] : NULL;
                if ($data[$i]['is_selected'] == 'true') {
                    $service_id['is_selected'] = true;
                } else {
                    $service_id['is_selected'] = false;
                }


                $sub_service_id['sub_category_id'] = self::find()
                                ->select('`services`.`category_id` as sub_category_id,`services`.`category_name` as sub_category_name ,`services`.`category_thumbnail`,`services`.`banner`,`services`.`banner_type`,`services`.`description`,(CASE WHEN (`provider_services`.`service_id` = `services`.`category_id` OR `provider_services`.`sub_service_id` = `services`.`category_id`) THEN "true" ELSE "false" END) as is_selected')
                                ->leftJoin('provider_services', '(`provider_services`.`service_id` = `services`.`category_id` OR `provider_services`.`sub_service_id` = `services`.`category_id`)')
                                ->ByParentCat($data[$i]['category_id'])
                                ->asArray()->all();
                if (!empty($sub_service_id['sub_category_id'])) {
                    for ($j = 0; $j < count($sub_service_id['sub_category_id']); $j++) {
                        $sub_service_id['sub_category_id'][$j]['category_thumbnail'] = !empty($sub_service_id['sub_category_id'][$j]['category_thumbnail']) ? $url .'/'. $sub_service_id['sub_category_id'][$j]['category_thumbnail'] : NULL;
                        $sub_service_id['sub_category_id'][$j]['banner'] = !empty($sub_service_id['sub_category_id'][$j]['banner']) ? $url . $sub_service_id['sub_category_id'][$j]['banner'] : NULL;
                        $sub_service_id['sub_category_id'][$j]['banner_type'] = !empty($sub_service_id['sub_category_id'][$j]['banner_type']) ? $sub_service_id['sub_category_id'][$j]['banner_type'] : NULL;

                        if ($sub_service_id['sub_category_id'][$j]['is_selected'] == 'true') {
                            $sub_service_id['sub_category_id'][$j]['is_selected'] = true;
                        } else {
                            $sub_service_id['sub_category_id'][$j]['is_selected'] = false;
                        }
                    }
                }

                $dataarray[$i] = array_merge($service_id, $sub_service_id);
            }

            return $dataarray;
        } else {
            return null;
        }
    }

    /**
     * To get the preparation status with respect to geiven catgory and subcategory
     */
    public static function getPreparationStatus() {
        $bool = $this->isCategory($this->category_id, $this->sub_category_id);
        if ($bool) {

            $data = Packages::getPreparations($this->category_id, $this->sub_category_id);
            if (!empty($data)) {
                return $data;
            } else {
                return null;
            }
        } else {

            return null;
        }
    }

    /**
     * To set the data for sorting
     *
     * @return sort
     */
    public static function setSortData() {
        $sort = new \yii\data\Sort([
            'attributes' => [
                'category_name' => [
                    'asc' => ['category_name' => SORT_ASC],
                    'desc' => ['category_name' => SORT_DESC],
                    'default' => SORT_DESC,
                    'label' => 'Category Name',
                ]
            ],
        ]);

        return $sort;
    }

    /**
     * To check if a subcategory belongs to a valid category
     *
     * @return TRUE|FALSE
     */
    public function isCategory($category_id = null, $sub_category_id = null) {
        if (!empty($sub_category_id)) {
            $data = self::find()->select('parent')->ByCategory($sub_category_id, 'Active')->asArray()->one();

            if ($category_id == $data['parent']) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    /**
     * To call the category query and get the result
     *
     * @return TRUE|FALSE
     */
    public static function callCategoryQuery($sub_service_id, $active) {
        return self::find()->select('category_name')->ByCategory($sub_service_id, $active)->asArray()->One();
    }

    /**
     * Get all the services for admin category section and filter result through search
     *
     * @return $services|NULL
     */
    public static function adminGetAllServices($search = null) {

        if (!empty($search)) {
            $query = self::find()->bySearch($search, 0);

            $dataProvider = new \yii\data\ActiveDataProvider([
                'query' => $query,
                'pagination' => [
                    'pageSize' => 20,
                ],
            ]);
        } else {
            $query = self::find()->byAdminParent(0);

            $dataProvider = new \yii\data\ActiveDataProvider([
                'query' => $query,
                'pagination' => [
                    'pageSize' => 20,
                ],
            ]);
        }

        return $dataProvider->getModels();
    }

    /**
     * Admin function to add category
     *
     * @return True|False
     */
    public function addCategory($subcategory = null, $edit = null, $id = null) {

        if ($edit) {
            $services = Services::find()->where('category_id = :category_id ', [':category_id' => $id])->one();
        } else {
            $services = new Services();
        }

        $services->category_name = !empty($this->category_name) ? $this->category_name : '';
        $services->icon_id = !empty($this->icon_id) ? $this->icon_id : '';

        if ($subcategory == 1) {

            $services->category_thumbnail = 'resource/images/' . $this->icon_name . '.png';
            $banner = $this->banner;
            if (!empty($banner)) {

                if (!empty($services->banner)) {
                    $file = \Yii::getAlias('@webroot') . ltrim($services->banner, '.');
                    unlink($file);
                }
                if (!empty($services->video_thumbnail)) {
                    $file_video = \Yii::getAlias('@webroot') . ltrim($services->video_thumbnail, '.');
                    unlink($file_video);
                }

                if (strpos($banner->type, 'image') !== false) {
                    $services->banner_type = 'Image';
                }
                if (strpos($banner->type, 'video') !== false) {
                    $services->banner_type = 'Video';
                }
                $services->banner = $this->banner;
                $dirpath = './resource/images/banner/';

                if (!is_dir($dirpath)) {
                    \yii\helpers\FileHelper::createDirectory($dirpath, 0755, true);
                }

                $dirpath = $dirpath . time() . '_';
                $basename = preg_replace('/\s+/', '_', $banner->baseName);
                $banner->saveAs($dirpath . $basename . '.' . $banner->extension);
                $dirpath = ltrim($dirpath, '.');
                $services->banner = $dirpath . $basename . '.' . $banner->extension;

                if (strpos($banner->type, 'video') !== false) {
                    $video = $dirpath . $basename . '.' . $banner->extension;
                    $path = \Yii::getAlias('@webroot');
                    $video = $path . $video;
                    $upload_dir = '/resource/images/banner/' . time() . '_videothumb.jpg';
                    $thumbnail = $path . '/resource/images/banner/' . time() . '_videothumb.jpg';
                    $video_thumbnail = \common\components\Utility::createVideoThubnails($video, $thumbnail, $upload_dir);
                    //$video_thumbnail = ltrim($video_thumbnail, '/');
                    $services->video_thumbnail = $video_thumbnail;
                }
            }

            $services->preparation_status = $this->preparation_status;
            $services->description = $this->description;
            $services->parent = $this->parent;
        } else {
            if(is_array($this->icon_name)) {
                $services->category_image = 'resource/images/' . $this->icon_name[0] . '.png';
            } else {
                $services->category_image = 'resource/images/' . $this->icon_name . '.png';
            }
            
            
            $services->parent = 0;
        }
        $services->status = 'Active';
        if ($edit) {
            if ($services->update(false)) {
                return true;
            }
        } else {
            if ($services->save(false)) {
                return true;
            }
        }
        return false;
    }

    /**
     * To check if category exists
     *
     * @return Category_name|Null
     */
    public static function IsCategoryExist($category_name = null) {
        return self::find()
                        ->where('category_name = :category_name')
                        ->addParams([':category_name' => "{$category_name}"])
                        ->one();
    }

    /**
     * Update status of a particular category
     *
     * @return True|Null
     */
    public static function updateStatus($category_id = null, $status = null) {
        return self::updateAll(['status' => $status], "category_id = {$category_id}");
    }

    /**
     * Delete a particular category
     *
     * @return True|Null
     */
    public static function deleteCategory($category_id = null) {

        return self::deleteAll("category_id = {$category_id}");
    }

    /**
     * Get all the subcategories of a particular category
     *
     * @return Subcategories|Null
     */
    public static function adminGetSubCategoies($category_id = null, $search = null) {

        if (!empty($search)) {
            $query = self::find()->bySubSearch($search, 0);

            $dataProvider = new \yii\data\ActiveDataProvider([
                'query' => $query,
                'pagination' => [
                    'pageSize' => 20,
                ],
            ]);
        } else {
            $query = self::find()->byAdminParent($category_id);
            $dataProvider = new \yii\data\ActiveDataProvider([
                'query' => $query,
                'pagination' => [
                    'pageSize' => 20,
                ],
            ]);
        }

        return $dataProvider->getModels();
    }

    /**
     * Get all the details of a particular category
     *
     * @return Subcategory|Null
     */
    public static function adminGetSubCategory($category_id = null) {
        $returndata = self::find()->ByID($category_id)->asArray()->one();
        $icon = IconClass::getIconByID($returndata['icon_id']);
        $returndata['class_name'] = $icon['class_name'];

        return $returndata;
    }

    /**
     * Get all the details of a particular category
     *
     * @return Subcategory|Null
     */
    public static function adminGetAllSubCategories() {
        $returndata = self::find()->byAdminSubCategory()->asArray()->all();
        //$icon = IconClass::getIconByID($returndata['icon_id']);
        //$returndata['class_name'] = $icon['class_name'];        
        return $returndata;
    }

    /**
     * Get category/subcategory Id by name
     */
    public static function getCatID($category_name = null) {
        return self::find()->select('category_id')->byName($category_name)->one();
    }
    
    /**
     * Get category/subcategory Id by name
     */
    public static function getCatName($category_id = null) {
        return self::find()->select('category_name')->byID($category_id)->one();
    }

    /**
     * Get parent category name by categoryId
     */
    public static function getParentCatName($parent = null) {
        $category_data = self::find()->select('category_name')->ByCategory($parent, 'Active')->one();
        if (!empty($category_data)) {
            return $category_data['category_name'];
        } else {
            return null;
        }
    }

    /*     * *
     * Create custom calender Content
     * 
     * ** */

    public function customCalenderSlider($day = null,$month = null,$year = null) {
        //$this->currentDay = $day;
        
        if($month == date('m') || $month == null) {
            $this->currentDay = date('d');
        } 
        
        $session = Yii::$app->session;
        
        $session['current_day'] = $day;
        $this->setCalenderData($month,$year);
        $day_slider ='<div class="day-slider owl-carousel owl-theme" id="day-slider">';
                
        $weeksInMonth = $this->_weeksInMonth($this->month, $this->year);
        // Create weeks in a month
        for ($i = 0; $i < $weeksInMonth; $i++) {

            //Create days in a week
            for ($j = 1; $j <= 7; $j++) {

                // $day_slider .=$this->_showDay($i*7+$j,'active');

                if (!empty($day_slider)) {
                    $day_slider .=$this->_showDay($i * 7 + $j, 'active');
                }
            }
        }       

        $day_slider .='</div>';

        return $day_slider;
    }

    /*     * *
     * Create custom calender Slider
     * 
     * ** */

    public function customContent($month = null,$year = null) {

        $this->setCalenderData($month,$year);
        $content = '<div id="calendar"><div class="box">'.$this->_createNavi($month = null,$year = null).'</div></div>';
        //echo $content;die('....');
        return $content;
    }

    /*     * ******************* PRIVATE ********************* */

    /**
     * create the li element for ul
     */
    public function _showDay($cellNumber, $active = null) {
        $session = Yii::$app->session;
        if ($this->currentDay == 0) {

            $firstDayOfTheWeek = date('N', strtotime($this->currentYear . '-' . $this->currentMonth . '-01'));

            if (intval($cellNumber) == intval($firstDayOfTheWeek)) {

                $this->currentDay = 1;
            }
        }
        
        if (($this->currentDay != 0) && ($this->currentDay <= $this->daysInMonth)) {        
            
            $this->currentDate = date('Y-m-d', strtotime($this->currentYear.'-'.$this->currentMonth.'-'.($this->currentDay)));
            
            $dw = date("l", strtotime($this->currentDate));
            
            //$today = strtotime(date('Y') . '-' . date('m') . '-' . (date('d')));
            $today = strtotime(date('Y') . '-' . date('m') . '-01');

            $cureentdate = strtotime($this->currentDate);
            
            if ($cureentdate >= $today) {
                if($this->currentDay == $session->get('current_day')) {
                    $cellContent = '<div class="date-number currentday">'. $this->currentDay.'</div><span class="day-name">'.strtoupper($dw).'</span>';
                } else {
                    $cellContent = '<div class="date-number">'. $this->currentDay.'</div><span class="day-name">'.strtoupper($dw).'</span>';
                }
                
            } else {
                $cellContent = null;
            }

            $this->currentDay++;
        } else {

            $this->currentDate = null;

            $cellContent = null;
        }

        if ($cellContent == null) {
            return null;
        } else {
            //return '<li id="li-'.$this->currentDate.'" class="'.($cellNumber%7==1?' start ':($cellNumber%7==0?' end ':' ')).
            //    ($cellContent==null?'mask':'').'">'.$cellContent.'</li>';
            $active = !empty($active) ? 'item active' : 'item';
            
            return '<div class="daysliderclass ' . $active . '">
                        <div class="item-cnt">
                            <a href="javascript:void(0);" id="li-' . $this->currentDate . '" class="' . ($cellNumber % 7 == 1 ? ' start ' : ($cellNumber % 7 == 0 ? ' end ' : ' ')) .
                    ($cellContent == null ? 'mask' : '') . '">' . $cellContent . '</a></div></div>';
        }
    }

    /**
     * create navigation
     */
    public function _createNavi() {
        $url = Yii::$app->urlManager->createUrl('');
        $nextMonth = $this->currentMonth == 12 ? 1 : intval($this->currentMonth) + 1;

        $nextYear = $this->currentMonth == 12 ? intval($this->currentYear) + 1 : $this->currentYear;

        $preMonth = $this->currentMonth == 1 ? 12 : intval($this->currentMonth) - 1;

        $preYear = $this->currentMonth == 1 ? intval($this->currentYear) - 1 : $this->currentYear;

        $year_duration = date('Y') + 1;

        $future_date = strtotime('+1 year');

        $current_duration = strtotime($this->currentYear . '-' . $this->currentMonth);

        $condition = strtotime(date('Y') . '-' . (date('m')));

        if ($current_duration < $future_date) {

            $currnt = $this->currentYear . '-' . $this->currentMonth;

            if (strtotime('now') >= strtotime($currnt)) {

                return
                        '<div class="header month">' .
                        '<a class="prev" data-month="javascript:void(0);" data-year="javascript:void(0);" href="javascript:void(0);"><img src="'.$url.'resource/images/left-arrow.png"></a>'.
                        '<span class="title">' . date('M Y', strtotime($this->currentYear . '-' . $this->currentMonth . '-1')) . '</span>'.
                        //'<a class="next" data-month="'.$nextMonth.'" data-year="'.$nextYear.'" href="' . $this->naviHref . '?month=' . sprintf("%02d", $nextMonth) . '&year=' . $nextYear . '"><img src="../resource/images/right-aarow.png"></a>' .
                        '<a class="next" data-month="'.$nextMonth.'" data-year="'.$nextYear.'" href="javascript:void(0);"><img src="'.$url.'resource/images/right-aarow.png"></a>' .
                        '</div>';
            }

            $neardate = strtotime('+1 year - 1 month');

            if (strtotime($currnt) < $neardate) {

                return

                        '<div class="header month">' .
                        //'<a class="prev" data-month="'.$preMonth.'" data-year="'.$preYear.'" href="' . $this->naviHref . '?month=' . sprintf('%02d', $preMonth) . '&year=' . $preYear . '"><img src="../resource/images/left-arrow.png"></a>' .
                        '<a class="prev" data-month="'.$preMonth.'" data-year="'.$preYear.'" href="javascript:void(0);"><img src="'.$url.'resource/images/left-arrow.png"></a>' .
                        '<span class="title">' . date('M Y', strtotime($this->currentYear . '-' . $this->currentMonth . '-1')) . '</span>' .
                        //'<a class="next" data-month="'.$nextMonth.'" data-year="'.$nextYear.'" href="' . $this->naviHref . '?month=' . sprintf("%02d", $nextMonth) . '&year=' . $nextYear . '"><img src="../resource/images/right-aarow.png"></a>' .
                        '<a class="next" data-month="'.$nextMonth.'" data-year="'.$nextYear.'" href="javascript:void(0);"><img src="'.$url.'resource/images/right-aarow.png"></a>' .
                        '</div>';
            } else {
                return

                        '<div class="header month">' .
                        //'<a class="prev" data-month="'.$preMonth.'" data-year="'.$preYear.'" href="' . $this->naviHref . '?month=' . sprintf('%02d', $preMonth) . '&year=' . $preYear . '"><img src="../resource/images/left-arrow.png"></a>' .
                        '<a class="prev" data-month="'.$preMonth.'" data-year="'.$preYear.'" href="javascript:void(0);"><img src="'.$url.'resource/images/left-arrow.png"></a>' .
                        '<span class="title">' . date('M Y', strtotime($this->currentYear . '-' . $this->currentMonth . '-1')) . '</span>' .
                        '<a class="next" data-month="javascript:void(0);" data-year="javascript:void(0);" href="javascript:void(0);"><img src="'.$url.'resource/images/right-aarow.png"></a>' .
                        '</div>';
            }
        }
    }

    /**
     * create calendar week labels
     */
    public function _createLabels() {

        $content = '';

        foreach ($this->dayLabels as $index => $label) {

            $content.='<li class="' . ($label == 6 ? 'end title' : 'start title') . ' title">' . $label . '</li>';
        }

        return $content;
    }

    /**
     * calculate number of weeks in a particular month
     */
    public function _weeksInMonth($month = null, $year = null) {

        if (null == ($year)) {
            $year = date("Y", time());
        }

        if (null == ($month)) {
            $month = date("m", time());
        }

        // find number of days in this month
        $daysInMonths = $this->_daysInMonth($month, $year);

        $numOfweeks = ($daysInMonths % 7 == 0 ? 0 : 1) + intval($daysInMonths / 7);

        $monthEndingDay = date('N', strtotime($year . '-' . $month . '-' . $daysInMonths));

        $monthStartDay = date('N', strtotime($year . '-' . $month . '-01'));

        if ($monthEndingDay < $monthStartDay) {

            $numOfweeks++;
        }

        return $numOfweeks;
    }

    /**
     * calculate number of days in a particular month
     */
    public function _daysInMonth($month = null, $year = null) {

        if (null == ($year))
            $year = date("Y", time());

        if (null == ($month))
            $month = date("m", time());

        return date('t', strtotime($year . '-' . $month . '-01'));
    }

    /**
     * calculate number of days in a particular month
     */
    public function setCalenderData($month,$year) {
        
        if (null == $this->year && isset($year)) {

            $this->year = $year;
        } else if (null == $this->year) {

            $this->year = date("Y", time());
        }

        if (null == $this->month && isset($month)) {

            $this->month = $month;
        } else if (null == $this->month) {

            $this->month = date("m", time());
        }

        $this->currentYear = $this->year;

        $this->currentMonth = $this->month;

        $this->daysInMonth = $this->_daysInMonth($this->month, $this->year);
        return true;        
    }

    /**
     * creates timeslider time schedule
     */
    public static function timeSlider($slots_data = null ,$appointment_data = null) {
        
        $appointment_time = '';
        if(!empty($appointment_data)) {
            $appointment_time = !empty($appointment_data->appointment_time) ? $appointment_data->appointment_time : '';
            $appointment_date = !empty($appointment_data->appointment_date) ? $appointment_data->appointment_date : '';
            $date_time = $appointment_date.' '. $appointment_time;
            $appointment_time = date('g:i A', strtotime($date_time));            
        }
        //echo '<pre/>';print_r($slots_data);die('...');
        //echo $appointment_time;die;
        $timeslider = '<div class="time-slider owl-carousel owl-theme" id="time-slider">';
        if(!empty($slots_data)) {
            foreach ($slots_data as $slots) {
                $slotselected = '';
                if($slots['start_time'] == $appointment_time) {
                    $slotselected ='selected';
                }
                //echo '<pre/>';
                //                print_r($slots);die;
                //echo $slots['start_time'];die('...');
                $timeslider .= '<div class="timeslideclass item '.$slotselected.'"><div class="item-cnt"><a href="javascript:void(0);"><div class="time-number">';
                $timeslider .= $slots['start_time'];
                //$timeslider .= $slots['end_time'];
                $timeslider .= '</div></a></div></div>';                 
            }            
        }
        /*for ($i = 9; $i < 19; $i++) {
            $j = 0;
            while ($j < 60) {

                //$j = ($j==60)? 0 : $j;
                //if ($j == 60) {
                //    $timedata = ($i + 1) . ':00';
                //} else {
                    $timedata = $i . ':' . $j;
                //}

                $timeslider .= '<div class="timeslideclass item"><div class="item-cnt"><a href="javascript:void(0);"><div class="time-number">';
                $timeslider .= date('h:i a', strtotime($timedata));
                $timeslider .= '</div></a></div></div>';
                $j = $j + 5;
            }
        }
        
        if($j==60) {
            $j=0;
        }
        $timedata = $i . ':' . $j;
        $timeslider .= '<div class="timeslideclass item"><div class="item-cnt"><a href="javascript:void(0);"><div class="time-number">';
        $timeslider .= date('h:i a', strtotime($timedata));
        $timeslider .= '</div></a></div></div>';*/
                
        $timeslider .= '</div>';

        return $timeslider;
    }

}
