<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "user_membership".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $plan_id
 * @property string $price
 * @property string $off_percent
 * @property string $start_date
 * @property string $end_date
 * @property string $plan_detail
 * @property integer $is_active
 * @property string $duration
 * @property string $created_at
 * @property string $updated_at
 *
 * @property MasterMembershipPlan $plan
 * @property User $user
 */
class BaseUserMembership extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_membership';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'plan_id', 'is_active'], 'integer'],
            [['price', 'off_percent'], 'number'],
            [['start_date', 'end_date', 'created_at', 'updated_at'], 'safe'],
            [['duration'], 'string'],
            [['plan_detail'], 'string', 'max' => 255],
            [['plan_id'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\MasterMembershipPlan::className(), 'targetAttribute' => ['plan_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\User::className(), 'targetAttribute' => ['user_id' => 'id']],
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
            'plan_id' => 'Plan ID',
            'price' => 'Price',
            'off_percent' => 'Off Percent',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'plan_detail' => 'Plan Detail',
            'is_active' => 'Is Active',
            'duration' => 'Duration',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlan()
    {
        return $this->hasOne(MasterMembershipPlan::className(), ['id' => 'plan_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
