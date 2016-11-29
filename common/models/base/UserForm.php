<?php
namespace common\models\base;

use Yii;

use \yii\db\ActiveRecord;
use common\models\User;
use common\models\Authtoken;
use common\components\customvalidators\CheckEmailValidator;
/**
 * User Model handles all the CRUD and basic operations for user 
 *
 */
class UserForm extends ActiveRecord
{   const SCENARIO_EDITPROFILE = 'editprofile';
        
    public $first_name;
    public $last_name;
    public $email;
    public $password;
    public $confirm_password;
    //public $profile_image;
    public $user_type;
    public $device_id;
    public $device_type;
    public $dev_certificate;
    public $gender;
    public $birth_date;
    public $cell_phone;
    public $address;
    public $about_me;
    public $country;
    public $postal_code;
    
    public $originalimg;
    public $profile_thumbimg;
    
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }
    
    /**
     * Scenario for edit profile
     */
    
     public function scenarios()
    {           
        $scenarios = parent::scenarios();
        $scenarios[self::SCENARIO_EDITPROFILE] = ['first_name', 'last_name','birth_date','gender','cell_phone','address','about_me','profile_image','latitude','longitude'];
        $scenarios['adminEditProfile'] = ['first_name','last_name','birth_date','gender'];
        return $scenarios;
    }   
    /**
     * Define rules for validation
     */
    public function rules()
    {   
        return [
            [['first_name','password','confirm_password','last_name','user_type','device_id','device_type','dev_certificate','email','cell_phone','postal_code','address','address2','profile_image','profile_image_thumb','province','postal_code','country','about_me','gender','birth_date','latitude','longitude'],'trim'],
            [['first_name','last_name','email','password','confirm_password','user_type'],'required'],
            //[['device_id','device_type'],'required','on' => 'apiregister'],
            [['first_name'],'match','pattern' => '/^[a-zA-Z]+$/','message'=>"Only alphabets are allowed"],
            [['first_name'],'string','min' => 2, 'max' => 30],
            [['last_name'],'match','pattern' => '/^[a-zA-Z]+$/','message'=>"Only alphabets are allowed"],
            [['last_name'],'string','min' => 2, 'max' => 30],
            [['last_name'],'string','min' => 2, 'max' => 30],
            ['password', 'string', 'min' => 6,'max' => 25],
            ['confirm_password', 'compare', 'compareAttribute'=>'password', 'message'=>"Passwords don't match" ],
            ['confirm_password', 'string', 'min' => 6,'max' => 25],
            ['device_id', 'string', 'max' => 30],
            ['device_type', 'string','max' => 30],
            ['dev_certificate', 'string','max' => 100],
            ['user_type', 'in','range' =>['Client','Provider']],
            ['email', 'string', 'max' => 100],
            ['email', 'email'],
            [['email'], CheckEmailValidator::className()],
            ['birth_date', 'required','on' => [self::SCENARIO_EDITPROFILE,'adminEditProfile'],'message' => 'Enter valid Birth Date'],
            ['birth_date', \common\components\customvalidators\CheckBirthDateValidator::className(),'on' => [self::SCENARIO_EDITPROFILE,'adminEditProfile']],
            [['profile_image'],'file','on' => self::SCENARIO_EDITPROFILE],
            [['profile_image'],  \common\components\customvalidators\CheckImageValidator::className(),'on' => self::SCENARIO_EDITPROFILE],
            ['profile_image', 'file', 'extensions' => ['png', 'jpg', 'jpeg'], 'maxSize' => 1024 * 1024 * 5,'on' => self::SCENARIO_EDITPROFILE],            
        ];
    }
        
    /**
     * Savind the data for the user
     */
    public function setUserData($id = null,$profile_image = null,$profile_image_thumb = null,$isadmin = null)
    {   Yii::$app->db->createCommand('set foreign_key_checks=0')->execute();
        if(!empty($id)) {
            
            $user = \common\models\User::findOne(['id' => $id]);
                   
            $user = $this->setData($id,$user,$profile_image,$profile_image_thumb,$isadmin);
            
            if($user->update(false)) {
                return TRUE;
            } else {
                return FALSE;
            }
                
            
        } else {            
            //Yii::$app->db->createCommand('set foreign_key_checks=0')->execute();
            
            $user = new User();
            $user = $this->setData($id,$user,$profile_image);
            
            $user->setPassword($this->password);
            $user->generateAuthKey();
            
            if($user->save(false)) {
                $user_auth = new Authtoken();
                
                $user_auth = $this->setAuthData($user->id ,$user_auth);

                if($user_auth->validate() && $user_auth->save()) {   
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
    
    /***
     * Set the value for user data for update
     * ***/
    public function setData($id = null,$user = null,$profile_image = null,$profile_image_thumb = null,$isadmin = null) 
    {   
        if(!empty($this->first_name)) {
            $user->first_name = $this->first_name;
        }
        
        if(!empty($this->last_name)) {
            $user->last_name  = $this->last_name;
        }
                
        if(!empty($this->email)) {
            $user->email = $this->email;
        }
        if(!empty($this->user_type)) {
            
            $user->user_type = $this->user_type;
        }
        
        $dirpath = 'uploads/profile/images/'.date("Y").'/'.date("m").'/';
        $dirpath_thumb = 'uploads/profile/images/'.date("Y").'/'.date("m").'/thumb/';
        
        if(!empty($profile_image)) {          
            
            /*        
            //$dir = 'uploads/profile/'.$id.'/'; 
            if(!empty($id)) {
                $old_image = User::findImgage($id);
            
                if(!empty($old_image['profile_image']) && is_file($old_image['profile_image'])) {

                    unlink($old_image['profile_image']);
                }
            }
                       
            if (!is_dir($dirpath)) {
                mkdir($dirpath, 0777,true);
            }
            
            $dirpath = $dirpath.time().'_';
            if(!empty($isadmin)) {
                echo $dirpath. $this->originalimg;die('###');
                file_put_contents($dirpath, $this->originalimg); 
                $profile_image->saveAs($dirpath. $this->originalimg);
                $dirpath = ltrim($dirpath, './');
                $user->profile_image = $dirpath. $this->originalimg;            
            } else {
                $profile_image->saveAs($dirpath. $profile_image->baseName . '.' . $profile_image->extension);
                $user->profile_image = $dirpath. $profile_image->baseName . '.' . $profile_image->extension;            
            }*/
            
            $user->profile_image = \common\components\Utility::saveProfileImg($dirpath,$profile_image,$id);            
        }       
        
        
        if(!empty($profile_image_thumb)) {            
            /*        
            if(!empty($id)) {
                $old_image = User::findImgage($id);
            
                if(!empty($old_image['profile_image_thumb']) && is_file($old_image['profile_image_thumb'])) {

                    unlink($old_image['profile_image_thumb']);
                }
            }
                       
            if (!is_dir($dirpath_thumb)) {
                mkdir($dirpath_thumb, 0777,true);
            }
            
            $dirpath_thumb = $dirpath_thumb.time().'_';
            
            $profile_image->saveAs($dirpath. $profile_image->baseName . '.' . $profile_image->extension);
            
            $user->profile_image = $dirpath. $profile_image->baseName . '.' . $profile_image->extension;*/
            
            $user->profile_image = \common\components\Utility::saveProfileThumbImg($dirpath_thumb,$profile_image_thumb,$id);
            
        }
        
        if(!empty($isadmin)) {
            $user->profile_image = \common\components\Utility::saveProfileImg($dirpath,$this->originalimg,$id,$isadmin);
            $user->profile_image_thumb = \common\components\Utility::saveProfileThumbImg($dirpath_thumb,$this->profile_thumbimg,$id,$isadmin);            
        }
        
        if(!empty($this->gender)) {
            if(is_array($this->gender)) {
                if(!empty($this->gender[0])) {
                $user->gender = $this->gender[0];
                }
                if(!empty($this->gender[1])) {
                    $user->gender = $this->gender[1];
                }
            } else {
                $user->gender = $this->gender;
            }
            
        }
        
        if(!empty($this->address2)) {
            $user->address2 = $this->address2;
        }
        
        if(!empty($this->address2)) {
            $user->address2 = $this->address2;
        }
        if(!empty($this->city)) {
            $user->city = $this->city;
        }
        
        if(!empty($this->province)) {
            $user->province = $this->province;
        }
        
        if(!empty($this->country)) {
            $user->country = $this->country;
        }
        
        if(!empty($this->birth_date)) {
            $date = date_create($this->birth_date);
            $user->birth_date = date_format($date,"Y-m-d");
        }
        
        if(!empty($this->cell_phone)) {
            $user->cell_phone = $this->cell_phone;
        }
        
        if(!empty($this->address)) {
            $user->address = $this->address;
        }
        
        if(!empty($this->about_me)) {
            $user->about_me = $this->about_me;
        }
        if(!empty($this->latitude)) {
            $user->latitude = $this->latitude;
        }
        if(!empty($this->longitude)) {
            $user->longitude = $this->longitude;
        }
        //echo '<pre/>';
        //                print_r($user);die;     
        return $user;
    }
    
    /***
     * Set the value for auth table data 
     * ***/
    public function setAuthData($id ,$user_auth) 
    {
        if(!empty($id)) {
            $user_auth->user_id = $id;
        }
        if(!empty($this->device_id)) {
            $user_auth->device_id = $this->device_id;
        }
        if(!empty($this->device_type)) {
            $user_auth->device_type = $this->device_type;
        }
        if(!empty($this->dev_certificate)) {
            $user_auth->dev_certificate = $this->dev_certificate;
        }
               
        return $user_auth;        
    }
  
}