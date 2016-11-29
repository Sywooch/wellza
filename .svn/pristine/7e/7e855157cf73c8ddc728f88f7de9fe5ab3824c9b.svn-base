<?php

namespace common\models;

use Yii;
use common\models\base\BaseProviderServices;
use common\models\query\ProviderServicesQuery;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "provider_services".
 *
 * @property integer $id
 * @property integer $provider_id
 * @property integer $service_id
 * @property integer $sub_service_id
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Services $service
 * @property User $provider
 * @property Services $subService
 */
class ProviderServices extends BaseProviderServices {

    public $access_token;
    public $add_service;

    /**
     * @inheritdoc
     */
    public function rules() {
        return ArrayHelper::merge(
                        parent::rules(), [
                    [['access_token'], \common\components\customvalidators\CheckISProviderValidator::className()],
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
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * @inheritdoc
     * @return \common\models\query\ProviderServicesQuery the active query used by this AR class.
     */
    public static function find() {
        return new \common\models\query\ProviderServicesQuery(get_called_class());
    }

    /**
     * Add services of a particular provider
     *
     */
    public function manageServices($edit = null, $screentype = null) {
        if ($screentype == 'web') {
            //$model = new ProviderServices();
            $add_services = json_decode($this->add_service);
            $provider_services = $this->setValue($add_services, null, $edit,$screentype);
            return $provider_services;
        } else {
            $auth = \common\models\Authtoken::findIdentityByAccessToken($this->access_token);
            $id = $auth->user_id;
            $add_services = json_decode($this->add_service);
            $data = $add_services->data;

            if (!empty($data)) {
                $provider_services = $this->setValue($data, $id, $edit);
                return true;
            } else {
                return false;
            }
        }
    }
    
    /**
     * Check if category already exists
     *
     */
    public function isCategoryExist($subservices_id = null) {
        
        $data = self::find()->where('sub_service_id=:sub_service_id',[':sub_service_id' => $subservices_id])->one();
        if(!empty($data)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /**
     * set the data for services for both save/update
     *
     */
    public function setValue($data = null, $id = null, $edit = null,$screentype = null) {
        $provider_services = new ProviderServices();
        Yii::$app->db->createCommand('set foreign_key_checks=0')->execute();
        if($screentype == 'web') {
            //For web executes here
            if($edit) {
                $pro_services = self::findOne(['id' => $id]);
                $pro_services->provider_id = Yii::$app->user->id;
                $pro_services->service_id = $this->service_id;
                $pro_services->sub_service_id = $this->sub_service_id;
                $pro_services->status = 'Active';
                
                if($provider_services->update(false)){
                    return TRUE;
                } else {
                    return null;
                }
            } else {
                $bool = 0;
                for($i=0;$i<count($data->add_service);$i++) {
                    if(!$this->isCategoryExist($data->add_service[$i])) {
                        $provider_services->provider_id = Yii::$app->user->id;
                        $provider_services->service_id = $data->service_id;
                        $provider_services->sub_service_id = $data->add_service[$i];
                        $provider_services->status = 'Active';
                        $provider_services->id = NULL;
                        $provider_services->isNewRecord = TRUE;
                        $provider_services->save(false);
                        $bool = 1;
                    }
                    
                }
                if($bool == 1) {
                    return TRUE;
                } 
                return FALSE;
                                                
            }
            
        } else {
            //For Api executes here
            if (!empty($edit)) {
            $provider_services->deleteAll(['provider_id' => $id]);
            }
            for ($i = 0; $i < count($data); $i++) {
                $category = $data[$i]->category_id;
                $sub_category = $data[$i]->sub_category_id;

                for ($j = 0; $j < count($sub_category); $j++) {
                    $provider_services->provider_id = $id;
                    $provider_services->service_id = $category;
                    $provider_services->sub_service_id = $sub_category[$j];
                    $provider_services->status = 'Active';
                    $provider_services->id = NULL;
                    $provider_services->isNewRecord = TRUE;
                    $provider_services->save(false);
                }
            }
        }
        
        Yii::$app->db->createCommand('set foreign_key_checks=1')->execute();
        return $provider_services;
    }

    /**
     * check services and sub services alloted to user
     *
     */
    public static function checkService($service_id = null, $sub_service_id = null, $provider_id = null) {
        return self::find()->byCategorySubcategory($provider_id, $service_id, $sub_service_id)->asArray()->all();
    }

}
