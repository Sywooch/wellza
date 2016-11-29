<?php

namespace common\models\base;

use Yii;
use yii\helpers\ArrayHelper;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
/**
 * This is the model class for table "favourite_list".
 *
 * @property integer $favourite_id
 * @property integer $user_id
 * @property integer $provider_id
 * @property string $created_at
 * @property string $updated_at
 *
 * @property User $user
 * @property User $provider
 */

class BaseFavouriteList extends ActiveRecord
{
    public $favourite;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'favourite_list';
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
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['provider_id','favourite'], 'trim'],
            [['provider_id'], 'required'],
            [['provider_id'], 'integer'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['provider_id'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\User::className(), 'targetAttribute' => ['provider_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'favourite_id' => 'Favourite ID',
            'user_id' => 'User ID',
            'provider_id' => 'Provider ID',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProvider()
    {
        return $this->hasOne(User::className(), ['id' => 'provider_id']);
    }

    /**
     * @inheritdoc
     * @return \common\models\query\FavouriteListQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\FavouriteListQuery(get_called_class());
    }
    
    /**
     * 
     * add the favourite providers of a user
     */
    public function addFavourites()
    {   $bool = 0;
        $favourite = new BaseFavouriteList();
        $access_token = Yii::$app->request->getHeaders()->get('access-token');
        $auth = \common\models\Authtoken::findIdentityByAccessToken($access_token);
       
        $data = self::findOne(['provider_id' => $this->provider_id,'user_id' => $auth->user_id]);
               
        if(empty($data)) {
            
            $favourite->user_id = $auth->user_id;
            $favourite->provider_id = $this->provider_id;

            if($this->favourite == "True") {
                $favourite->status = 'Active';
            } else {
                $favourite->status = 'Inactive';
            }
            $favourite->save();
            $bool = 1;        
        } else {
            Yii::$app->db->createCommand('set foreign_key_checks=0')->execute();
            $data->user_id = $auth->user_id;
            $data->provider_id = $this->provider_id;

            if($this->favourite == "True") {
                $data->status = 'Active';
            } else {
                $data->status = 'Inactive';
            }
            $data->update();
            Yii::$app->db->createCommand('set foreign_key_checks=1')->execute();
            $bool = 1;
        }
        
        if($bool == 1) {
            return true;
        } else {
            return false;
        }
    }   
            
}
