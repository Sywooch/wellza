<?php
/* * ********************************************************************************************************************* *//**
 *  Model Name: User.php
 *  Created: Codian Team
 *  Description: Manages the crud operations for admin,providers and client.It inherits the properties
 *  of the base class rules and attribute labels. 
 * ************************************************************************************************************************* */

namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
use yii\helpers\ArrayHelper;
use yii\filters\RateLimitInterface;
use yii\data\ActiveDataProvider;
use common\models\Authtoken;
use common\components\customvalidators\CheckEmailValidator;
use yii\imagine\Image;
use yii\helpers\Json;
use Imagine\Image\Box;
use Imagine\Image\Point;
use yii\helpers\FileHelper;
use yii\web\UploadedFile;

/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 */
class User extends ActiveRecord implements IdentityInterface, RateLimitInterface {

    const SCENARIO_EDITPROFILE = 'editprofile';

    public $rateLimit = 1;
    public $allowance;
    public $allowance_updated_at;
    public $device_id;
    public $device_type;
    public $dev_certificate;
    public $access_token;
    public $password;
    public $confirm_password;
    public $old_password;
    public $new_password;
    public $originalimg;
    public $profile_thumbimg;
    public $is_favourite;
    public $image;
    public $crop_info;

    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;
    const ROLE_CLIENT = 10;
    const ROLE_PROVIDER = 20;
    const ROLE_ADMIN = 30;

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * Scenario for User
     */
    public function scenarios() {
        $scenarios = parent::scenarios();
        $scenarios[self::SCENARIO_EDITPROFILE] = ['first_name', 'last_name', 'birth_date', 'gender', 'cell_phone', 'address', 'about_me', 'profile_image', 'latitude', 'longitude'];
        $scenarios['adminEditProfile'] = ['first_name', 'last_name', 'birth_date', 'gender'];
        $scenarios['providerEditProfile'] = ['first_name', 'last_name', 'birth_date', 'gender', 'cell_phone', 'address', 'city', 'province', 'address', 'address2', 'postal_code', 'country','image', 'profile_image', 'profile_image_thumb', 'experience_in_year', 'experience_in_month'];
        return $scenarios;
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['first_name', 'password', 'confirm_password', 'last_name', 'user_type', 'device_id', 'device_type', 'dev_certificate', 'email', 'cell_phone', 'postal_code', 'address', 'address2', 'profile_image', 'experience_in_year', 'experience_in_month', 'profile_image_thumb', 'province', 'postal_code', 'city', 'country', 'about_me', 'gender', 'birth_date', 'latitude', 'longitude'], 'trim'],
            [['first_name', 'last_name', 'email', 'password', 'confirm_password', 'user_type'], 'required'],
            [['first_name', 'last_name', 'birth_date', 'gender'], 'required', 'on' => 'adminEditProfile'],
            [['first_name', 'last_name', 'gender'], 'required', 'on' => 'providerEditProfile'],
            //[['device_id','device_type'],'required','on' => 'apiregister'],
            [['first_name'], 'match', 'pattern' => '/^[a-zA-Z]+$/', 'message' => "Only alphabets are allowed"],
            [['first_name'], 'string', 'min' => 2, 'max' => 30],
            [['last_name'], 'match', 'pattern' => '/^[a-zA-Z]+$/', 'message' => "Only alphabets are allowed"],
            [['last_name'], 'string', 'min' => 2, 'max' => 30],
            [['last_name'], 'string', 'min' => 2, 'max' => 30],
            ['password', 'string', 'min' => 6, 'max' => 25],
            ['confirm_password', 'compare', 'compareAttribute' => 'password', 'message' => "Passwords don't match"],
            ['confirm_password', 'string', 'min' => 6, 'max' => 25],
            ['device_id', 'string', 'max' => 30],
            ['device_type', 'string', 'max' => 30],
            ['dev_certificate', 'string', 'max' => 100],
            ['user_type', 'in', 'range' => ['Client', 'Provider']],
            ['email', 'string', 'max' => 100],
            ['email', 'email'],
            ['postal_code', 'string', 'max' => 6],
            ['postal_code', \common\components\customvalidators\CheckPostalCodeValidator::className()],            
            ['cell_phone', 'required', 'on' => 'providerEditProfile'],
            ['cell_phone', 'number', 'on' => 'providerEditProfile'],
            ['city', 'required', 'on' => 'providerEditProfile'],
            [['email'], CheckEmailValidator::className()],
            ['birth_date', 'required', 'on' => [self::SCENARIO_EDITPROFILE, 'adminEditProfile', 'providerEditProfile'], 'message' => 'Enter valid Birth Date'],
            ['birth_date', \common\components\customvalidators\CheckBirthDateValidator::className(), 'on' => [self::SCENARIO_EDITPROFILE, 'adminEditProfile', 'providerEditProfile']],
            //[['profile_image'], 'file', 'on' => self::SCENARIO_EDITPROFILE],
            //['profile_image','required','on' => 'providerEditProfile'],
            //['profile_image','safe','on' => 'providerEditProfile'],
            ['image','image','extensions' => ['jpg', 'jpeg', 'png', 'gif'],'mimeTypes' => ['image/jpeg', 'image/pjpeg', 'image/png', 'image/gif'],'on' => ['providerEditProfile','adminEditProfile']],
    
            //[['profile_image'], \common\components\customvalidators\CheckImageValidator::className(), 'on' => self::SCENARIO_EDITPROFILE],
            //['profile_image', 'file', 'extensions' => ['png', 'jpg', 'jpeg'], 'maxSize' => 1024 * 1024 * 5, 'on' => [self::SCENARIO_EDITPROFILE,'providerEditProfile']],
            [['status'], 'default', 'value' => self::STATUS_ACTIVE],
            [['status'], 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],
            ['crop_info', 'safe'],
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPortfolio() {
        return $this->hasMany(Portfolio::className(), ['user_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReviewRatings() {
        return $this->hasOne(ReviewRating::className(), ['provided_by' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReviewRatings0() {
        return $this->hasOne(ReviewRating::className(), ['provided_to' => 'id']);
    }

    public function fields() {
        return array_merge(parent::fields(), [
            'profile_image_url' => function($model) {
                $url = \yii\helpers\Url::to('@web', true);
                if (!empty($model->profile_image) && file_exists('./' . $model->profile_image)) {
                    return $url . '/' . $model->profile_image;
                } else {
                    return $url . '/uploads/profile/images/default-profile.png';
                }
            },
            'is_favourite' => function($model) {
                return FavouriteList::find()->byProviderId($model->id)->byStatus('Active')->byUserId(\Yii::$app->user->id)->count();
            }
        ]);
    }

    public function extraFields() {
        return array_merge(parent::extraFields(), [
            'portfolio' => function($model) {
                return $model->portfolio;
            },
            'review_count' => function($model) {
                return '78';
            },
            'rating' => function($model) {
                return '4.5';
            },
            'thread_id' => function($model) {
                $post = ['from_user_id' => $model->id, 'to_user_id' => Yii::$app->user->id];
                $threadData = Message::checkThread($post);
                if (!empty($threadData)) {
                    return $threadData['thread_id'];
                } else {
                    return '';
                }
            }
                ]);
            }

            /**
             * Validation function to check if email already exists
             */
            public function uniqueEmail($attribute, $params) {
                $email = $this->email;

                $checkUniqueExistenceForEmail = self::find()->where([ 'email' => $email])->One();

                if (!empty($checkUniqueExistenceForEmail)) {

                    $this->addError('email', 'Email address already exists');
                }
            }

            /**
             * @inheritdoc
             */
            public static function findIdentity($id) {
                return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
            }

            /**
             * @inheritdoc
             */
            public static function findAllByIdentity($id) {
                return static::findOne(['id' => $id]);
            }

            /**
             * @inheritdoc
             */
            public static function findIdentityByAccessToken($token, $type = null) {
                //throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
                if (empty($token)) {
                    return null;
                }
                $userDevice = Authtoken::findOne(['access_token' => $token]);
                if (!empty($userDevice)) {
                    $user = self::findOne(['id' => $userDevice->user_id]);
                    $user->access_token = $token;
                    return $user;
                } else
                    return null;
            }

            /**
             * Finds user by username
             *
             * @param string $username
             * @return static|null
             */
            public static function findByUsername($username) {
                return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
            }

            /**
             * Finds user profile image
             *
             * @param string $id
             * @return static|null
             */
            public static function findImgage($id, $email = null) {
                if (!empty($email)) {
                    return static::find()->select('profile_image,profile_image_thumb')->ByParamEmail($email, self::STATUS_ACTIVE)->asArray()->One();
                } else {
                    return static::find()->select('profile_image,profile_image_thumb')->ByParams($id, self::STATUS_ACTIVE)->asArray()->One();
                }
            }

            /**
             * Finds user by email
             *
             * @param string $email
             * @return static|null
             */
            public static function findByEmail($email,$userType = null) {
                if(!empty($userType)) {
                    return static::findOne(['email' => $email,'user_type'=>$userType, 'status' => self::STATUS_ACTIVE]);
                }
                return static::findOne(['email' => $email, 'status' => self::STATUS_ACTIVE]);
            }

            /**
             * Finds user by email
             *
             * @param string $email
             * @return static|null
             */
            public static function findStatus($email) {
                return static::findOne(['email' => $email]);
            }

            /**
             * Finds admin by email
             *
             * @param string $email
             * @return static|null
             */
            public static function findByAdminEmail($email) {
                $user_type = 'Administrator';

                $returndata = static::find()->ByUserType($email, $user_type, self::STATUS_ACTIVE)->one();

                if (!empty($returndata)) {
                    return $returndata;
                } else {
                    return null;
                }
            }

            /**
             * Finds user by password reset token
             *
             * @param string $token password reset token
             * @return static|null
             */
            public static function findByPasswordResetToken($token) {
                if (!static::isPasswordResetTokenValid($token)) {
                    return null;
                }

                return static::findOne([
                            'password_reset_token' => $token,
                            'status' => self::STATUS_ACTIVE,
                ]);
            }

            /**
             * Finds out if password reset token is valid
             *
             * @param string $token password reset token
             * @return boolean
             */
            public static function isPasswordResetTokenValid($token) {
                if (empty($token)) {
                    return false;
                }

                $timestamp = (int) substr($token, strrpos($token, '_') + 1);
                $expire = Yii::$app->params['user.passwordResetTokenExpire'];
                return $timestamp + $expire >= time();
            }

            /**
             * @inheritdoc
             */
            public function getId() {
                return $this->getPrimaryKey();
            }

            /**
             * @inheritdoc
             */
            public function getAuthKey() {
                return $this->auth_key;
            }

            /**
             * @inheritdoc
             */
            public function validateAuthKey($authKey) {
                return $this->getAuthKey() === $authKey;
            }

            /**
             * Validates password
             *
             * @param string $password password to validate
             * @return boolean if password provided is valid for current user
             */
            public function validatePassword($password) {
                return Yii::$app->security->validatePassword($password, $this->password_hash);
            }

            /**
             * Generates password hash from password and sets it to the model
             *
             * @param string $password
             */
            public function setPassword($password) {
                $this->password_hash = Yii::$app->security->generatePasswordHash($password);
            }

            /**
             * Generates password hash from password and sets it to the model
             *
             * @param string $password
             */
            public static function getSocialPassword($email = null) {
                return self::find()->select('password_hash')->where('email = :email AND status = :status', [':email' => $email, ':status' => 10])->one();
            }

            /**
             * Generates "remember me" authentication key
             */
            public function generateAuthKey() {
                $this->auth_key = Yii::$app->security->generateRandomString();
            }

            /**
             * Generates new password reset token
             */
            public function generatePasswordResetToken() {
                $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
            }

            /**
             * Removes password reset token
             */
            public function removePasswordResetToken() {
                $this->password_reset_token = null;
            }

            /**
             * This is to generate random password for social logged in user
             */
            public function generateRandomPassword() {
                return Yii::$app->security->generateRandomString(8);
            }

            /**
             * To get the username
             *
             * @return email as username
             */
            public function getUsername() {
                return $this->getAttribute('email');
            }

            /**
             * To get the username
             *
             * @return email as username
             */
            public static function getUserType($access_token) {
                $user = Authtoken::findIdentityByAccessToken($access_token);
                $user_id = $user['user_id'];

                if (!empty($user_id)) {
                    return self::find()->select('user_type')->ById($user_id)->asArray()->one();
                } else {
                    return null;
                }
            }

            /**
             * Creating a relation of user with the authtoken
             *
             */
            public static function find() {
                return new query\UserQuery(get_called_class());
            }

            public function getAuthtoken() {
                return $this->hasOne(Authtoken::className(), ['user_id' => 'id']);
            }

            /**
             * Get profile data of a particular client or service provider
             */
            public static function getProfileData($id) {
                //return self::find()->select("first_name,last_name,gender,birth_date,mobile,address,about_me,profile_image")->ById($id)->asArray()->one();
                return self::find()
                                ->select('user.id,user.email,user.first_name,user.last_name,user.gender,user.profile_image,user.birth_date,user.address,user.postal_code,user.country,user.cell_phone,user.user_type,user.about_me,user.latitude,user.longitude,user.social_id,user.social_type,user.status,authtoken.access_token,authtoken.device_id,authtoken.device_type,authtoken.dev_certificate')
                                ->leftJoin('authtoken', '`authtoken`.`user_id` = `user`.`id`')
                                ->ByUserId($id)
                                ->asArray()
                                ->one();
            }

            /**
             * Get the list of all the users
             *
             * @return users|null
             */
            public static function getAllUsers($searchstring = null) {    // adjust the query by adding the filters
                $sort = self::setSortData();

                if (!empty($searchstring)) {
                    $query = self::find()->ByRole();
                    //$query->orFilterWhere(['like','email' , $searchstring]);
                    $query->orFilterWhere(['like', 'first_name', $searchstring]);
                    $query->orFilterWhere(['like', 'last_name', $searchstring]);
                    $query->orFilterWhere(['like', 'cell_phone', $searchstring]);
                    $query->orFilterWhere(['like', 'birth_date', $searchstring]);
                    $query->orFilterWhere(['like', 'address', $searchstring]);
                    $query->orderBy($sort->orders);
                    return $query;
                } else {
                    //$query = self::find();
                    $query = self::find()->ByRole();
                    return $query;
                }
            }

            /**
             * Get the list of all the users
             *
             * @return users|null
             */
            public static function adminGetAllUsers($searchstring = null, $user_type = null) {    // adjust the query by adding the filters
                //$sort = self::setSortData();        
                if (!empty($searchstring)) {

                    $query = self::find();
                    $query->orFilterWhere(['like', 'first_name', $searchstring]);
                    $query->orFilterWhere(['like', 'last_name', $searchstring]);
                    $query->orFilterWhere(['like', 'cell_phone', $searchstring]);
                    $query->orFilterWhere(['like', 'birth_date', $searchstring]);
                    $query->orFilterWhere(['like', 'address', $searchstring]);
                    $query->andFilterWhere(['=', 'user_type', $user_type]);
                    //$query->orderBy($sort->orders);
                    return $query;
                } else {

                    $query = self::find()->ByRole($user_type);

                    return $query;
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
                        'first_name' => [
                            'asc' => ['first_name' => SORT_ASC],
                            'desc' => ['first_name' => SORT_DESC],
                            'default' => SORT_DESC,
                            'label' => 'NAME',
                        ],
                        'last_name' => [
                            'asc' => ['last_name' => SORT_ASC],
                            'desc' => ['last_name' => SORT_DESC],
                            'default' => SORT_DESC,
                            'label' => 'Lastname',
                        ],
                        'cell_phone' => [
                            'asc' => ['cell_phone' => SORT_ASC],
                            'desc' => ['cell_phone' => SORT_DESC],
                            'default' => SORT_DESC,
                            'label' => 'MOBILE',
                        ],
                        'birth_date' => [
                            'asc' => ['birth_date' => SORT_ASC],
                            'desc' => ['birth_date' => SORT_DESC],
                            'default' => SORT_DESC,
                            'label' => 'BIRTHDATE',
                        ],
                    ],
                ]);

                return $sort;
            }

            /**
             * To set the status of a client or provider
             *
             * @return User
             */
            public static function updateStatus($user_id, $status) {
                return self::updateAll(['status' => $status], "id = {$user_id}");
            }

            /**
             * To set the status as verified for a provider
             *
             * @return User
             */
            public static function updateVerificationStatus($user_id, $status) {
                return self::updateAll(['verified' => $status], "id = {$user_id}");
            }

            /**
             * To delete a provider
             *
             * @return User
             */
            public static function deleteUser($id) {
                return self::deleteAll(['id' => $id]);
            }

            public function getRateLimit($request, $action) {
                return [$this->rateLimit, 1];
            }

            public function loadAllowance($request, $action) {
                return [$this->allowance, $this->allowance_updated_at];
            }

            public function saveAllowance($request, $action, $allowance, $timestamp) {
                $this->allowance = $allowance;
                $this->allowance_updated_at = $timestamp;
                $this->save();
            }

            /**
             * Serch provider
             */
            public static function searchProviders($params) {

                $toTime = strtotime("+" . $params['service_time_duration'] . " minutes", strtotime($params['service_time']));
                $toTime = date('H:i:s', $toTime);
                $query = User::find()->byActiveStatus()
                        ->select("user.id,"
                                . "user.first_name,"
                                . "user.last_name,"
                                . "user.profile_image,"
                                . "user.address,user.address2,user.city,user.postal_code,user.country")
                        ->where(['user_type' => 'provider']);
                $query->andFilterWhere(['AND',
                    ['=', 'ps.service_id', $params['service_id']],
                    ['=', 'ps.sub_service_id', $params['sub_service_id']],
                    ['=', 'ps.status', 'active'],
                    ['=', 'pa.on_date', $params['service_date']],
                    ['<=', 'pa.from_time', $params['service_time']],
                    ['>=', 'pa.to_time', $toTime]
                ]);
                $query->join('join', 'provider_services ps', 'user.id=ps.provider_id');
                $query->join('join', 'availability pa', 'user.id=pa.user_id');
                if (!empty($params['is_favourite']) && $params['is_favourite']) {
                    $query->join('join', 'favourite_list fl', "fl.user_id=" . Yii::$app->user->id . " AND fl.provider_id =user.id AND fl.status = 'active'");
                }
                $dataProvider = new ActiveDataProvider([
                    'query' => $query,
                    'pagination' => [
                        'pageSize' => 10
                    ],
                ]);
                if (!empty($dataProvider)) {
                    $result = [];
                    foreach ($dataProvider->getModels() as $provider) {
                        $provider['is_favourite'] = FavouriteList::find()->byProviderId($provider['id'])->byStatus('Active')->byUserId(\Yii::$app->user->id)->one();
                        $result[] = $provider;
                    }
                    $dataProvider->setModels($result);
                }
                return $dataProvider;
            }

            public static function favouriteProviders($params) {

                $query = User::find()->byActiveStatus()
                        ->select("user.id,"
                                . "user.first_name,"
                                . "user.last_name,"
                                . "user.profile_image,"
                                . "user.address,user.address2,user.city,user.postal_code,user.country")
                        ->where(['user_type' => 'provider']);
                $query->join('join', 'favourite_list fl', "fl.user_id=" . Yii::$app->user->id . " AND fl.provider_id =user.id AND fl.status = 'active'");
                $dataProvider = new ActiveDataProvider([
                    'query' => $query,
                    'pagination' => [
                        'pageSize' => 10
                    ],
                ]);
                if (!empty($dataProvider)) {
                    $result = [];
                    foreach ($dataProvider->getModels() as $provider) {
                        $provider['is_favourite'] = FavouriteList::find()->byProviderId($provider['id'])->byStatus('Active')->byUserId(\Yii::$app->user->id)->one();
                        $result[] = $provider;
                    }
                    $dataProvider->setModels($result);
                }
                return $dataProvider;
            }

            /**
             * Frontend Search Wellza provider
             */
            public static function searchWellzaProviders($params) {

                $query = User::find()->byActiveStatus()
                        ->where(['user_type' => 'provider']);
                $query->andFilterWhere(['OR',
                    ['LIKE', 'address', $params['Appointment']['address1']],
                    ['LIKE', 'address2', $params['Appointment']['address2']],
                    ['LIKE', 'city', $params['Appointment']['city']],
                    ['LIKE', 'province', $params['Appointment']['province']]
                ]);

                $dataProvider = new ActiveDataProvider([
                    'query' => $query,
                    'pagination' => [
                        'pageSize' => 10
                    ],
                ]);

                return $dataProvider;
            }

            /**
             * Savind the data for the user
             */
            public function setUserData($id = null, $profile_image = null, $profile_image_thumb = null, $isadmin = null) {
                
                Yii::$app->db->createCommand('set foreign_key_checks=0')->execute();
                if (!empty($id)) {

                    $user = \common\models\User::findOne(['id' => $id]);
                    
                    $user = $this->setData($id, $user, $profile_image, $profile_image_thumb, $isadmin);
                    //echo $user->update(false);die('...');
                    if ($user->update(false)) {
                        
                        return TRUE;
                    } else {
                        
                        return FALSE;
                    }
                } else {
                    //Yii::$app->db->createCommand('set foreign_key_checks=0')->execute();

                    $user = new User();
                    $user = $this->setData($id, $user, $profile_image);

                    $user->setPassword($this->password);
                    $user->generateAuthKey();

                    if ($user->save(false)) {
                        $user_auth = new Authtoken();

                        $user_auth = $this->setAuthData($user->id, $user_auth);

                        if ($user_auth->validate() && $user_auth->save()) {
                            
                            Yii::$app->db->createCommand('set foreign_key_checks=1')->execute();
                            return true;
                        } else {
                            
                            return null;
                        }
                    } else {
                        
                        return null;
                    }
                }
            }
            
            /** *
             * Crop the profile image and its thumbnail
             * ** */
            public function crop_images($user = null,$dirpath = null,$dirpath_thumb = null,$user_id = null) {
                if(!empty($this->image->tempName)) {
                    $id = '';
                    if(!empty($user_id)) {
                        $id = $user_id;
                    } else {
                        $id = Yii::$app->user->id;
                    }  

                    // open image
                    $image = Image::getImagine()->open($this->image->tempName);

                    // rendering information about crop of ONE option 
                    $cropInfo = Json::decode($this->crop_info)[0];

                    $cropInfo['dWidth'] = (int) $cropInfo['dWidth']; //new width image
                    $cropInfo['dHeight'] = (int) $cropInfo['dHeight']; //new height image
                    $cropInfo['x'] = $cropInfo['x']; //begin position of frame crop by X
                    $cropInfo['y'] = $cropInfo['y']; //begin position of frame crop by Y

                    //delete old images             
                    if (!empty($id)) {
                        $old_image = \common\models\User::findImgage($id);
                        if (!empty($old_image['profile_image'])) {

                            //$file = \Yii::getAlias('@webroot') . '/' . $old_image['profile_image'];
                            $file = \Yii::getAlias('@frontend').'/web/' . $old_image['profile_image'];

                            $file = str_replace('\\', '/', $file);
                            if (file_exists($file)) {
                                unlink($file);
                            }
                        }
                    }

                    //saving thumbnail
                    $newSizeThumb = new Box($cropInfo['dWidth'], $cropInfo['dHeight']);
                    $cropSizeThumb = new Box(200, 200); //frame size of crop
                    $cropPointThumb = new Point($cropInfo['x'], $cropInfo['y']);

                    $pathThumbImage = \Yii::getAlias('@frontend').'/web/' .$dirpath_thumb. $id
                            . '.'
                            . $this->image->getExtension();

                    $image->resize($newSizeThumb)
                            ->crop($cropPointThumb, $cropSizeThumb)
                            ->save($pathThumbImage, ['quality' => 100]);

                    $user->profile_image_thumb = $dirpath_thumb. $id . '.'. $this->image->getExtension();

                    //saving original
                    $this->image->saveAs(
                           \Yii::getAlias('@frontend').'/web/' . $dirpath
                            . '/'
                            . $id
                            . '.'
                            . $this->image->getExtension()
                    );

                    $user->profile_image = $dirpath. '/'. $id . '.'. $this->image->getExtension();
                }                 
            }
            
            /** *
             * Set the value for user data for update
             * ** */

            public function setData($id = null, $user = null, $profile_image = null, $profile_image_thumb = null, $isadmin = null) {
                if (!empty($this->first_name)) {
                    $user->first_name = $this->first_name;
                }

                if (!empty($this->last_name)) {
                    $user->last_name = $this->last_name;
                }

                if (!empty($this->email)) {
                    $user->email = $this->email;
                }
                if (!empty($this->user_type)) {

                    $user->user_type = $this->user_type;
                }

                $dirpath = 'uploads/profile/images/' . date("Y") . '/' . date("m") . '/';
                $dirpath_thumb = 'uploads/profile/images/' . date("Y") . '/' . date("m") . '/thumb/';
                
               
                if (!empty($profile_image) && empty($isadmin)) {
                    $user->profile_image = \common\components\Utility::saveProfileImg($dirpath, $profile_image, $id);
                    
                }
                
                if (!empty($profile_image_thumb) && empty($isadmin)) {
                    $user->profile_image = \common\components\Utility::saveProfileThumbImg($dirpath_thumb, $profile_image_thumb, $id);
                }
                                
                if (!empty($isadmin)) {
                    
                    $this->crop_images($user,$dirpath,$dirpath_thumb,$id);
                    //$user->profile_image = \common\components\Utility::saveProfileImg($dirpath, $this->originalimg, $id, $isadmin);
                    //$user->profile_image_thumb = \common\components\Utility::saveProfileThumbImg($dirpath_thumb, $this->profile_thumbimg, $id, $isadmin);
                }
                
                if (!empty($this->gender)) {
                    if (is_array($this->gender)) {
                        if (!empty($this->gender[0])) {
                            $user->gender = $this->gender[0];
                        }
                        if (!empty($this->gender[1])) {
                            $user->gender = $this->gender[1];
                        }
                    } else {
                        $user->gender = $this->gender;
                    }
                }

                if (!empty($this->address2)) {
                    $user->address2 = $this->address2;
                }

                if (!empty($this->address2)) {
                    $user->address2 = $this->address2;
                }
                if (!empty($this->city)) {
                    $user->city = $this->city;
                }

                if (!empty($this->postal_code)) {
                    $user->postal_code = $this->postal_code;
                }

                if (!empty($this->province)) {
                    $user->province = $this->province;
                }

                if (!empty($this->country)) {
                    $user->country = $this->country;
                }

                if (!empty($this->birth_date)) {
                    $date = date_create($this->birth_date);
                    $user->birth_date = date_format($date, "Y-m-d");
                }

                if (!empty($this->cell_phone)) {
                    $user->cell_phone = $this->cell_phone;
                }

                if (!empty($this->experience_in_year)) {
                    $user->experience_in_year = $this->experience_in_year;
                }

                if (!empty($this->experience_in_month)) {
                    $user->experience_in_month = $this->experience_in_month;
                }

                if (!empty($this->address)) {
                    $user->address = $this->address;
                }

                if (!empty($this->about_me)) {
                    $user->about_me = $this->about_me;
                }
                if (!empty($this->latitude)) {
                    $user->latitude = $this->latitude;
                }
                if (!empty($this->longitude)) {
                    $user->longitude = $this->longitude;
                }
                
                return $user;
            }

            /*             * *
             * Set the value for auth table data 
             * ** */

            public function setAuthData($id, $user_auth) {
                if (!empty($id)) {
                    $user_auth->user_id = $id;
                }
                if (!empty($this->device_id)) {
                    $user_auth->device_id = $this->device_id;
                }
                if (!empty($this->device_type)) {
                    $user_auth->device_type = $this->device_type;
                }
                if (!empty($this->dev_certificate)) {
                    $user_auth->dev_certificate = $this->dev_certificate;
                }
                return $user_auth;
            }

            public static function providerDetail($providerId) {
                $user = self::find()->where(['id' => $providerId, 'status' => 10])->one();
                return $user;
            }
            
            /** *
             * get list of all active providers for client 
             * ** */
            public static function getAllClientProvider() {
                $returndata = array();
                $id = Yii::$app->user->id;
                $userquery = new \yii\db\Query;
                $userquery->select('*')
                        ->from('user')
                        ->where(['user_type' => 'Provider','user.status' => 10]);
                $command = $userquery->createCommand();
                $result = $command->queryAll();
                $i=0;
                foreach($result as $data) {
                    
                    $messagequery = new \yii\db\Query;
                    $messagequery->select('*')
                        ->from('message_recipient')
                        ->leftJoin('message', 'message.id = message_recipient.message_id')
                        ->where(['message_recipient.from_user_id' => $data['id'],'message_recipient.to_user_id' => $id])
                        ->orderBy(['message_recipient.updated_at' => SORT_DESC])
                        ->one();        
                    $messagecommand = $messagequery->createCommand();
                    $messageresult = $messagecommand->queryAll();
                    $returndata[$i]['user'] = $data;
                    $returndata[$i]['message'] = $messageresult;
                    $i++;
                }             
                              
                return $returndata;        
            }
            
            /** *
             * get list of all active Client for Provider 
             * ** */
            public static function getAllProviderClient() {
                $returndata = array();
                $id = Yii::$app->user->id;
                $userquery = new \yii\db\Query;
                $userquery->select('*')
                        ->from('user')
                        ->where(['user_type' => 'Client','user.status' => 10]);
                $command = $userquery->createCommand();
                $result = $command->queryAll();
                $i=0;
                foreach($result as $data) {
                    
                    $messagequery = new \yii\db\Query;
                    $messagequery->select('*')
                        ->from('message_recipient')
                        ->leftJoin('message', 'message.id = message_recipient.message_id')
                        ->where(['message_recipient.from_user_id' => $data['id']])
                        ->orderBy(['message_recipient.updated_at' => SORT_DESC])
                        ->one();        
                    
                    $messagecommand = $messagequery->createCommand();
                    $messageresult = $messagecommand->queryAll();
                    $returndata[$i]['user'] = $data;
                    $returndata[$i]['message'] = $messageresult;
                    $i++;
                }             
                
                return $returndata;    
            }

        }
/* * ********************************************************************************************************************************** */
// EOF: User.php
/* * ********************************************************************************************************************************** */