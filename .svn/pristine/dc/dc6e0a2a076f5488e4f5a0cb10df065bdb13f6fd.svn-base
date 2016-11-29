<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $first_name
 * @property string $last_name
 * @property string $gender
 * @property string $profile_image
 * @property string $birth_date
 * @property string $address
 * @property string $zip
 * @property string $country
 * @property string $mobile
 * @property string $about_me
 * @property string $user_type
 * @property string $social_id
 * @property string $social_type
 * @property string $token_id
 * @property integer $status
 * @property string $last_login_time
 * @property string $last_login_ip
 * @property string $latitude
 * @property string $longitude
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Appointment[] $appointments
 * @property Authtoken[] $authtokens
 * @property Availability[] $availabilities
 * @property FavouriteList[] $favouriteLists
 * @property FavouriteList[] $favouriteLists0
 * @property Portfolio[] $portfolios
 * @property ProviderServices[] $providerServices
 */
class BaseCustomer extends \yii\db\ActiveRecord
{   
    public $access_token;
    public $service_id;
    public $sub_service_id;
    public $latitude;
    public $longitude;
    public $provider_id;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }
        
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['service_id', 'sub_service_id', 'latitude', 'longitude'], 'trim'],
            [['service_id', 'sub_service_id', 'latitude', 'longitude'], 'required'],
            [['service_id', 'sub_service_id'], 'integer'],
            [['latitude', 'longitude'], 'number'],
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAppointments()
    {
        return $this->hasMany(BaseAppointment::className(), ['customer_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthtokens()
    {
        return $this->hasMany(Authtoken::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAvailabilities()
    {
        return $this->hasMany(BaseAvailability::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFavouriteLists()
    {
        return $this->hasMany(FavouriteList::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFavouriteLists0()
    {
        return $this->hasMany(FavouriteList::className(), ['provider_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPortfolios()
    {
        return $this->hasMany(BasePortfolio::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProviderServices()
    {
        return $this->hasMany(BaseProviderServices::className(), ['provider_id' => 'id']);
    }
    
    public static function find() {
        return new \common\models\query\UserQuery(get_called_class());
    }
    
}
