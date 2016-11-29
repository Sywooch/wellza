<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "user_points".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $mp_id
 * @property string $points
 * @property string $type
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 *
 * @property MasterPoints $mp
 * @property User $user
 */
class BaseUserPoints extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_points';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'mp_id', 'points'], 'integer'],
            [['type', 'status'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['mp_id'], 'exist', 'skipOnError' => true, 'targetClass' => MasterPoints::className(), 'targetAttribute' => ['mp_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'mp_id' => 'Mp ID',
            'points' => 'Points',
            'type' => 'Type',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMp()
    {
        return $this->hasOne(MasterPoints::className(), ['id' => 'mp_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
