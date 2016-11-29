<?php
namespace common\models;

use Yii;
use yii\base\Model;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\db\Expression;

/**
 * Authtoken model
 *
 * @property integer $id
 * @property string $user_id
 * @property string $access_token
 * @property string $device_id
 * @property string $device_type
 * @property string $dev_certificate
 * @property integer $created_at
 * @property integer $updated_at
 */

class Authtoken extends ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%authtoken}}';
    }
        
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
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
    
    public function rules()
    {
        return [
            //[['user_id','device_id','device_type','dev_certificate','access_token'],'trim'],
            [['user_id','device_id','device_type','dev_certificate','access_token'],'safe'],
        ];
    }
        
    /**
     * @inheritdoc
     */
    
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
        //throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAccessTokens()
    {
        return $this->access_token;
    }
  
    /**
     * Generates "remember me" authentication key
     */
    public function generateAccessToken()
    {
        $this->access_token = Yii::$app->security->generateRandomString();
    }
    
    /**
     * Creating a relation of user with the authtoken
     *
     */
        
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);        
    }
  
}