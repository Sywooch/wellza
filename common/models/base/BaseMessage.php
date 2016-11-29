<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "message".
 *
 * @property integer $id
 * @property integer $thread_id
 * @property string $subject
 * @property string $message
 * @property integer $appointment_id
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 *
 * @property Appointment $appointment
 * @property MessageRecipient[] $messageRecipients
 */
class BaseMessage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'message';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['thread_id', 'appointment_id'], 'integer'],
            [['message', 'status'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['subject'], 'string', 'max' => 255],
            [['appointment_id'], 'exist', 'skipOnError' => true, 'targetClass' => Appointment::className(), 'targetAttribute' => ['appointment_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'thread_id' => 'Thread ID',
            'subject' => 'Subject',
            'message' => 'Message',
            'appointment_id' => 'Appointment ID',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAppointment()
    {
        return $this->hasOne(Appointment::className(), ['id' => 'appointment_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMessageRecipients()
    {
        return $this->hasMany(MessageRecipient::className(), ['message_id' => 'id']);
    }
}
