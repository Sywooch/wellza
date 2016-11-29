<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;
use common\components\Utility;
use yii\data\SqlDataProvider;

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
class MessageRecipient extends \common\models\base\BaseMessageRecipient
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
            [['message_id', 'to_user_id', 'from_user_id'],'required'],
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
     * 
     * @return type
     */
    public function behaviors()
    {
        return ArrayHelper::merge(
                parent::behaviors(),
                [
                    [
                        'class' => \yii\behaviors\TimestampBehavior::className(),
                        'value' => function(){
                            return date('Y-m-d H:i:s');
                        },
                    ],
                ]    
            );
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
    
    public function saveMessageRecipient($messageId)
    {
        $this->message_id = (int)$messageId;
        if($this->save(false)){
            Utility::sendPushNotification($this->to_user_id, 'new message',[]);
            return $this;
        }  else {
            
            return $this;
        }     
        
    }
    
    /**
     * Get all the message of a client or provider
     * @param type $from_user_id,$to_user_id
     * @return SqlDataProvider
     */
    public static function getAllMessages($from_user_id,$to_user_id) {
        
        self::updateMessageStatus($from_user_id,$to_user_id);    

        $return_html = '';
        $site_url = \Yii::$app->urlManager->createUrl('');
        $returndata = MessageRecipient::find()->select(['message_recipient.*','message.*'])
                        ->leftJoin('message', '`message`.`id` = `message_recipient`.`message_id`')
                        ->ByIds($from_user_id,$to_user_id)
                        ->orderBy(['(message_recipient.updated_at)' => SORT_ASC])
                        ->all();
        if(!empty($returndata)) {
            $class='';
            foreach($returndata as $data) {
                
                if($data->from_user_id == $from_user_id) {
                    $class='you';
                }else{
                    $class='me';
                }
                
                $message_updated_at = $data->updated_at;
                $timestamp = strtotime($message_updated_at);
                $message_date = date('M d, Y, h:m A', $timestamp);
                $user_data = \common\models\User::findIdentity($data->from_user_id);
                $profile_image = !empty($user_data->profile_image_thumb) ? '../'.$user_data->profile_image_thumb : $site_url . '/images/default-profile.png';
                $message = !empty($data->message->message) ? $data->message->message : '';
                
                $return_html .= '<div id="tb-message-box" class="message-box '.$class.'">';
                $return_html .= '<div class="message-box-desc">';
                $return_html .= '<img src="'.$profile_image.'" alt="" />';
                $return_html .= '<span class="time-date">'.$message_date.'</span>';
                $return_html .= '</div>';
                $return_html .= '<div class="message-box-section">';
                $return_html .= $message;
                $return_html .= '</div>';
                $return_html .= '</div>';
            }
        }
        return $return_html;
    }
        
    /**
     * Get the date in Today,Yesterdays label format
     * @param type $timestamp
     * @return $date
     */
    public function get_day_name($timestamp) {

        $date = date('d/m/Y', $timestamp);

        if ($date == date('d/m/Y')) {
            $date = 'Today';
        } else if ($date == date('d/m/Y', now() - (24 * 60 * 60))) {
            $date = 'Yesterday';
        } else {
            
        }
        return $date;
    }
    
    /**
     * Update the status of unread message as read
     * @param type $from_user_id,$to_user_id
     * @return true
     */
    public static function updateMessageStatus($from_user_id,$to_user_id) {
        $query = 'UPDATE message_recipient SET read_status="read" WHERE (from_user_id = '.$from_user_id.' AND to_user_id = '.$to_user_id.') OR (from_user_id = '.$to_user_id.' AND to_user_id = '.$from_user_id.')';
        yii::$app->db->createCommand($query)->execute();
        return true;
    }

}
