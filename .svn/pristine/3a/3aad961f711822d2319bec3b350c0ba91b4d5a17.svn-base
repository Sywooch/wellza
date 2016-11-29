<?php
namespace common\models;

use Yii;
use common\models\base\BaseCustomer;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;

class Customer extends BaseCustomer
{   
    /**
     * @inheritdoc
     */
    public function rules() {
        return ArrayHelper::merge(
            parent::rules(),
            [
                ['provider_id','required','on' => 'providerdetail'],
                ['provider_id','integer','on' => 'providerdetail']
            ]);
    }
    
    /**
     * @inheritdoc
     */   
    public function attributeLabels() {
        return ArrayHelper::merge(
            parent::attributeLabels(),
            [
                    
            ]);
    }
    
    /**
     * @inheritdoc
     */
    public function scenarios()
    {           
        $scenarios = parent::scenarios();
        $scenarios['providerdetail'] = ['provider_id'];
        return $scenarios;
    }
    
    /**
     * Get all the providers list
     *
     */
    public function getProvidersData($provider = null) 
    { 
        return $data = self::find()
                            ->select("user.*,favourite_list.status as favstatus,portfolio.*")
                            ->leftJoin('portfolio','`portfolio`.`user_id` = `user`.`id`')
                            ->leftJoin('favourite_list','`favourite_list`.`provider_id` = `user`.`id`')
                            ->one();
        $auth = \common\models\Authtoken::findIdentityByAccessToken($this->access_token);
        $user_id = $auth->user_id;
        $service_id = $this->service_id;
        $sub_service_id = $this->sub_service_id;
        $latitude = $this->latitude;
        $longitude = $this->longitude;
        $url = \yii\helpers\Url::to('@web', true);
        if(!empty($provider) && $user_id != $this->provider_id) {
            $data = self::find()
                            ->select("user.*,favourite_list.status as favstatus,portfolio.*")
                            ->leftJoin('portfolio','`portfolio`.`user_id` = `user`.`id`')
                            ->leftJoin('favourite_list','`favourite_list`.`provider_id` = `user`.`id`')
                            ->ByProvider($this->provider_id,'10')
                            ->asArray()->one();
            if(!empty($data)) {
                $returndata['name'] = $data['first_name'].' '.$data['last_name'];
                $returndata['provider_id'] = $data['user_id'];
                $returndata['provider_image'] = !empty($data['profile_image'])?$url.'/'.$data['profile_image']:$url.'/images/default-profile.png' ;
                $returndata['provider_address'] = $data['address'];
                $returndata['reviews_count'] = '';
                $returndata['provider_rating'] = '';
                $returndata['about_me'] = $data['about_me'];
                $result = Portfolio::getPortfolioData($this->provider_id);
                
                for($i=0;$i<count($result);$i++) {
                    
                    $returndata['media'][$i]['media_id'] = $result[$i]['media_id'];
                    $returndata['media'][$i]['media_type'] = $result[$i]['media_type'];
                    $returndata['media'][$i]['media_url'] = !empty($result[$i]['media_url'])? $result[$i]['media_url']: NULL;        
                }
                
                if($data['favstatus'] == 'Active') {
                    $returndata['favourite'] = 'TRUE';
                } else {
                    $returndata['favourite'] = 'FALSE';
                }
            }             
              
        } else {
            if($user_id != $this->provider_id) {
                $data = self::find()
                            ->select("user.*,favourite_list.*")
                            ->leftJoin('provider_services','`provider_services`.`provider_id` = `user`.`id`')
                            ->leftJoin('favourite_list','`favourite_list`.`provider_id` = `provider_services`.`provider_id`')
                            ->ByStatus('10','Provider',$service_id,$sub_service_id,$latitude,$longitude)
                            ->asArray()->all();
            
                if(!empty($data)) {
                    for($i=0;$i<count($data);$i++)
                    {
                        $returndata[$i]['name'] = $data[$i]['first_name'].' '.$data[$i]['last_name'];
                        $returndata[$i]['provider_id'] = $data[$i]['id'];
                        $returndata[$i]['provider_image_url'] = !empty($data[$i]['profile_image']) ? $url.'/'.$data[$i]['profile_image'] : NULL;
                        $returndata[$i]['provider_address'] = $data[$i]['address'];
                        if(!empty($data[$i]['status'])) {
                            $returndata[$i]['favourite'] = 'TRUE';
                        } else {
                            $returndata[$i]['favourite'] = 'FALSE';
                        }

                    }
                }
            }
            
        }
        
        if(!empty($returndata)) {
            return $returndata;
        } else {
            return null;
        }
        
    }
    
     /**
     * Get the list of all the user includes client and service provider
     *
     */
    public static function getAllUser($searchstring = null,$user_type = null) 
    { 
        
        if(!empty($searchstring)) {
            $query = User::adminGetAllUsers($searchstring,$user_type);
        } else {
            $query = User::adminGetAllUsers(null,$user_type);
        }
        
        $dataProvider = new \yii\data\ActiveDataProvider(
        [
            'query' => $query,
            'pagination' => 
                [ 
                    'pageSize' => 3,
                ],
        ]);
        
        //return $dataProvider->getModels();
        return $dataProvider;
    }
}

