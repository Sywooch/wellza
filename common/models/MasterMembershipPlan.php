<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "master_membership_plan".
 *
 * @property integer $id
 * @property string $duration
 * @property string $price
 * @property string $off_percent
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 */
class MasterMembershipPlan extends \common\models\base\BaseMasterMembershipPlan
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'master_membership_plan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['duration', 'status'], 'string'],
            [['price'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['off_percent'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'duration' => 'Duration',
            'price' => 'Price',
            'off_percent' => 'Off Percent',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @inheritdoc
     * @return \common\models\query\MasterMembershipPlanQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\MasterMembershipPlanQuery(get_called_class());
    }
    
    
    public static function getPlan(){
        return self::find()->byStatus('Active')->one();
    }
}
