<?php

namespace common\models\base;

use Yii;
use yii\db\ActiveQuery;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use common\components\customvalidators\CheckTimeFormatValidator;

/**
 * This is the model class for table "availability".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $on_date
 * @property string $from_time
 * @property string $to_time
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Availability $availability
 */
class BaseAvailability extends \yii\db\ActiveRecord
{      
    public $slot_id;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'availability';
    }
        
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['slot_id', 'from_time','to_time','on_date'],'trim'],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\User::className(), 'targetAttribute' => ['user_id' => 'id']],
            [['on_date'],'required'],
            [['from_time','to_time'],'required'],
            [['on_date'], 'date', 'format' => 'yyyy-mm-dd'],
            [['from_time','to_time'],CheckTimeFormatValidator::className()]            
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
            'on_date' => 'On Date',
            'from_time' => 'From Time',
            'to_time' => 'To Time',
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
}
