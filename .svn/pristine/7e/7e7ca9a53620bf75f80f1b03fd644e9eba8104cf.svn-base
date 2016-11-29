<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "favourite_list".
 *
 * @property integer $favourite_id
 * @property integer $user_id
 * @property integer $provider_id
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 *
 * @property User $user
 * @property User $provider
 */
class FavouriteList extends base\BaseFavouriteList {

    /**
     * Creating a relation of user with the authtoken
     *
     */
    public static function find() {
        return new query\FavouriteListQuery(get_called_class());
    }

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'favourite_list';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['user_id', 'provider_id'], 'required'],
            [['user_id', 'provider_id'], 'integer'],
            [['status'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['provider_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['provider_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'favourite_id' => 'Favourite ID',
            'user_id' => 'User ID',
            'provider_id' => 'Provider ID',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * set timestamp behaviout to created_at and updated_at
     * @return type
     */
    public function behaviors() {
        return ArrayHelper::merge(
                        parent::behaviors(), [
                    [
                        'class' => \yii\behaviors\TimestampBehavior::className(),
                        'value' => function() {
                            return date('Y-m-d H:i:s');
                        },
                    ],
                        ]
        );
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser() {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProvider() {
        return $this->hasOne(User::className(), ['id' => 'provider_id']);
    }

    public static function markFavourite($params,$screen_type = null ) {
        $model = self::find()->byProviderId($params['provider_id'])->byUserId($params['user_id'])->one();
        if (empty($model)) {
            $model = new FavouriteList;
        }
        $model->attributes = $params;
        
        if (!empty($params['is_favourite'])) {
            $model->status = 'Active';
        } else {
            $model->status = 'Inactive';
        }
        //For web use only
        //if($screen_type == 'web') {
        //    $model->status = 'Active';
        //}
        return $model->save(false);
    }

}
