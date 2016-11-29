<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "master_points".
 *
 * @property integer $id
 * @property string $name
 * @property integer $point
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 *
 * @property UserPoints[] $userPoints
 */
class BaseMasterPoints extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'master_points';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['point'], 'integer'],
            [['status'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'point' => 'Point',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserPoints()
    {
        return $this->hasMany(UserPoints::className(), ['mp_id' => 'id']);
    }
}
