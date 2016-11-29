<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "user_bundle".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $bundle_id
 * @property string $price
 * @property string $savings
 * @property string $start_date
 * @property string $end_date
 * @property string $bundle_detail
 * @property integer $is_active
 * @property string $created_at
 * @property string $updated_at
 *
 * @property User $user
 * @property Bundles $bundle
 */
class BaseUserBundle extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_bundle';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'bundle_id', 'is_active'], 'integer'],
            [['price', 'savings'], 'number'],
            [['start_date', 'end_date', 'created_at', 'updated_at'], 'safe'],
            [['bundle_detail'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['bundle_id'], 'exist', 'skipOnError' => true, 'targetClass' => Bundles::className(), 'targetAttribute' => ['bundle_id' => 'bundle_id']],
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
            'bundle_id' => 'Bundle ID',
            'price' => 'Price',
            'savings' => 'Savings',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'bundle_detail' => 'Bundle Detail',
            'is_active' => 'Is Active',
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
    public function getBundle()
    {
        return $this->hasOne(Bundles::className(), ['bundle_id' => 'bundle_id']);
    }
}