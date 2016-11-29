<?php
namespace common\models;

use Yii;
use yii\base\Model;
/**
 * Login form
 */
class LoginForm extends Model
{   
    const SCENARIO_APILOGIN = 'apilogin';
    public $email;
    public $password;
    public $social_type;
    public $social_id;
    public $user_type;
    public $rememberMe = true;

    private $_user;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['email', 'password'], 'required'],
            [['email'], 'email'],
            [['email',], 'validateEmail'],
            ['email', 'string', 'max' => 100],
            [['user_type', 'social_id', 'social_type', 'first_name', 'last_name','email','device_id','device_type'], 'required','on' => 'apilogin'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['password', 'validatePassword'],
            ['password', 'string', 'min' => 6,'max' => 25],
            ['social_type', 'validateSocial_type','on' => 'sociallogin' ],
                        
        ];
    }
    
    /**
     * Scenario for edit profile
     */
    
     public function scenarios()
    {           
        $scenarios = parent::scenarios();
        $scenarios[self::SCENARIO_APILOGIN] = ['user_type', 'social_id','social_type','first_name','last_name','email','about_me','device_id','device_type'];
        $scenarios['sociallogin'] = ['email','social_type','social_id'];
        return $scenarios;
    }
    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validatePassword($attribute, $params)
    {   
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            
            if (!$user || !$user->validatePassword($this->password)) {
                $data = User::findStatus($this->email);
                if($data->status == 0) {
                    Yii::$app->session->setFlash('login_error', 'Provider is inactive');
                    $this->addError($attribute, '');
                } else {
                    $this->addError($attribute, 'Incorrect username or password.');
                }
                
            }            
        }
    }
    
    /**
     * Validates the email.
     * This method serves as the inline validation for email.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validateEmail($attribute, $params)
    {   
        $email = $this->email;
        $returndata = User::findByEmail($this->email);
       
        if(empty($returndata)) {
            $this->addError($attribute, 'Email not registered to us');
        }        
    }
    
    /**
     * Validates the social type.
     */
    public function validateSocial_type($attribute, $params)
    {   
        $social_type = $this->social_type;
        $social_id = $this->social_id;
        
        $data = User::find()->BySocialType($social_type,$social_id)->one();
        
        if(empty($data)) {
            Yii::$app->session->setFlash('invalid_user', 'User is not regsitered');
            $this->addError($attribute, '');
        }
        
    }

    /**
     * Logs in a user using the provided email and password.
     *
     * @return boolean whether the user is logged in successfully
     */
    public function login()
    {   
        if ($this->validate()) {
            
            //$data = Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
            
            return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        } else {
            return false;
        }
       
    }
       
    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = User::findByEmail($this->email);
        }
        
        return $this->_user;
    }    
}
