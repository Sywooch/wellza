<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "message_recipient".
 *
 * @property integer $id
 * @property integer $message_id
 * @property integer $to_user_id
 * @property integer $from_user_id
 * @property string $status
 * @property string $read_status
 * @property integer $from_deleted
 * @property integer $to_deleted
 * @property string $created_at
 * @property string $updated_at
 *
 * @property User $toUser
 * @property Message $message
 * @property User $fromUser
 */
class BaseMessageRecipient extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'message_recipient';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['message_id', 'to_user_id', 'from_user_id', 'from_deleted', 'to_deleted'], 'integer'],
            [['status', 'read_status'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['to_user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['to_user_id' => 'id']],
            [['message_id'], 'exist', 'skipOnError' => true, 'targetClass' => Message::className(), 'targetAttribute' => ['message_id' => 'id']],
            [['from_user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['from_user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'message_id' => 'Message ID',
            'to_user_id' => 'To User ID',
            'from_user_id' => 'From User ID',
            'status' => 'Status',
            'read_status' => 'Read Status',
            'from_deleted' => 'From Deleted',
            'to_deleted' => 'To Deleted',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getToUser()
    {
        return $this->hasOne(User::className(), ['id' => 'to_user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMessage()
    {
        return $this->hasOne(Message::className(), ['id' => 'message_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFromUser()
    {
        return $this->hasOne(User::className(), ['id' => 'from_user_id']);
    }

    /**
     * @inheritdoc
     * @return \common\models\query\MessageRecipientQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\MessageRecipientQuery(get_called_class());
    }
}