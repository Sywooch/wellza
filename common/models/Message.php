<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\data\SqlDataProvider;

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
class Message extends \common\models\base\BaseMessage {
    public $notification;
    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'message';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['thread_id', 'appointment_id'], 'integer'],
            [['message', 'status'], 'string'],
            [['message'], 'required'],
            [['notification'],'trim','on' => 'clientinbox','skipOnEmpty' => true],
            [['created_at', 'updated_at'], 'safe'],
            [['subject'], 'string', 'max' => 255],
            [['appointment_id'], 'exist', 'skipOnError' => true, 'targetClass' => Appointment::className(), 'targetAttribute' => ['appointment_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
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
     * 
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
     * Scenario for User
     */
    public function scenarios() {
        $scenarios = parent::scenarios();
        $scenarios['clientinbox'] = ['message'];
        return $scenarios;
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAppointment() {
        return $this->hasOne(Appointment::className(), ['id' => 'appointment_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMessageRecipients() {
        return $this->hasMany(MessageRecipient::className(), ['message_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \common\models\query\MessageQuery the active query used by this AR class.
     */
    public static function find() {
        return new \common\models\query\MessageQuery(get_called_class());
    }

    /**
     * Function to save message
     * @param type $post Array
     * @return \common\models\MessageSave Object 
     * 
     */
    public function saveMessage($post) {
        
        $threadData = Message::checkThread($post);
        if (!empty($threadData)) {
            $threadId = $threadData['thread_id'];
            $this->thread_id = (int) $threadId;
        } else if (empty($threadData)) {
            $this->thread_id = 0;
        }
        $this->status = 'active';
        $this->message = str_replace('<script>', '', $this->message);
        if ($this->save()) {
            if ($this->thread_id == 0) {
                $this->thread_id = $this->id;
                $this->save(false);
            }
            return $this;
        } else {
            return $this;
        }
    }

    /**
     * 
     * @param type $post
     * @return type
     */
    public static function checkThread($post) {
        $sql = "SELECT * FROM (
                SELECT m.id,
                m.thread_id,
                mr.to_user_id,
                mr.from_user_id 
                FROM message m 
                JOIN message_recipient mr ON mr.message_id=m.id
                WHERE ((mr.from_user_id={$post['from_user_id']} AND mr.to_user_id={$post['to_user_id']}) OR (mr.to_user_id={$post['from_user_id']} AND mr.from_user_id={$post['to_user_id']}))
                ORDER BY m.updated_at ) AS T GROUP BY T.thread_id";
        return Yii::$app->db->createCommand($sql)->queryOne();
    }
    
    public static function deleteConversation($threadId, $userId) {
        $fromDelSql = "UPDATE message m INNER JOIN message_recipient mr ON m.id = mr.message_id SET mr.from_deleted =1 WHERE (
                    m.id ={$threadId} OR m.thread_id ={$threadId}
                    ) AND mr.from_user_id ={$userId}";

        yii::$app->db->createCommand($fromDelSql)->execute();

        $toDelSql = "UPDATE message m INNER JOIN message_recipient mr ON m.id = mr.message_id SET mr.to_deleted =1 WHERE (
                    m.id ={$threadId} OR m.thread_id ={$threadId}
                    ) AND mr.to_user_id ={$userId}";

        yii::$app->db->createCommand($toDelSql)->execute();

        return true;
    }
    /**
     * 
     * @param type $userId
     * @return SqlDataProvider
     */
    public static function getInboxList($userId) {
        $res = [];
        $condoiton = '';
        $sql = "select  uid AS user_id, CONCAT(u.first_name,' ',u.last_name) AS user_name,T.subject AS title,T.thread_id,T.message ,T.unread_count, T.status,type,T.created_at AS message_date,u.profile_image,T.tuser,T.fuser
                from ( SELECT m.*,mr.to_deleted,mr.from_deleted, (CASE WHEN( mr.from_user_id!= {$userId}) THEN mr.from_user_id ELSE mr.to_user_id END) 
                AS uid,(CASE WHEN( mr.from_user_id!= {$userId}) THEN 'receiver' ELSE 'sender' END) 
                AS type, (SELECT COUNT(*) from message msg  join message_recipient msg_res on msg.id= msg_res.message_id where msg_res.read_status = 'unread' AND msg.thread_id = m.thread_id AND to_user_id = {$userId}) AS unread_count,mr.to_user_id AS tuser ,mr.from_user_id AS fuser FROM `message` m JOIN message_recipient mr ON mr.message_id=m.id WHERE
                (
                    mr.from_user_id = {$userId}
                    OR mr.to_user_id = {$userId}
                ) order by m.created_at desc ) as T 
                JOIN user u ON u.id = T.uid  WHERE ( CASE WHEN (fuser = {$userId}) THEN T.from_deleted = 0 ELSE T.to_deleted = 0 END ) {$condoiton} group by T.thread_id ORDER BY T.created_at DESC";
        $countSql = "select count(*) from ({$sql}) as T";
        $count = yii::$app->db->createCommand($countSql)->queryScalar();
        $messageDataProvider = new SqlDataProvider([
            'sql' => $sql,
            'totalCount' => $count,
            'pagination' => ['pageSize' => 10],
        ]);
        if ($messageDataProvider->count > 0) {
            foreach ($messageDataProvider->getModels() as $listData) {
                if (!empty($listData['profile_image']) && file_exists('../../frontend/web/upload/user/profile_pic/' . $listData['profile_image'])) {
                    $listData['profile_image'] = Yii::$app->urlManagerFrontend->createAbsoluteUrl('') . 'upload/user/profile_pic/' . $listData['profile_image'];
                } else {
                    $listData['profile_image'] = Yii::$app->urlManagerFrontend->createAbsoluteUrl('') . 'images/default-profile.png';
                }
                $res[] = $listData;
            }
        }
        $messageDataProvider->setModels($res);
        return $messageDataProvider;
        return $dataProvider;
    }
    /**
     * 
     * @param type $threadId
     * @return SqlDataProvider
     */
    public static function getConversationMessage($threadId) {
        $userId = \yii::$app->user->id;
        $data = [];
        $updQry = "UPDATE message_recipient mr  
                JOIN message m 
                ON mr.message_id = m.id 
                SET mr.read_status = 'read' 
                WHERE (mr.to_user_id={$userId}) AND m.thread_id = {$threadId}";
        yii::$app->db->createCommand($updQry)->execute();
        $sql = "SELECT m.id AS message_id,m.thread_id,m.message,mr.from_user_id,mr.to_user_id,
                CONCAT(to_profile.first_name,' ',to_profile.last_name) AS to_user_name,
                CONCAT(from_profile.first_name,' ',from_profile.last_name) AS from_user_name,
                to_profile.profile_image AS to_profile_image ,from_profile.profile_image  AS from_profile_image,
                m.created_at AS message_date,DATE_FORMAT( m.created_at, '%Y-%m-%d' ) AS date
                FROM message m inner join 
                message_recipient mr on m.id=mr.message_id
                join user to_profile on mr.to_user_id = to_profile.id 
                join user from_profile on mr.from_user_id = from_profile.id 
                where thread_id = {$threadId}  AND 
                ((mr.from_user_id= {$userId} AND mr.from_deleted=0)  OR (mr.to_user_id= {$userId} AND mr.to_deleted=0) )
                GROUP BY message_date order by message_date DESC";
        $countSql = "select count(*) from ({$sql}) as T";
        $count = yii::$app->db->createCommand($countSql)->queryScalar();
        $messageDataProvider = new SqlDataProvider([
            'sql' => $sql,
            'totalCount' => $count,
            'pagination' => ['pageSize' => 20],
        ]);
        $res = [];
        if ($messageDataProvider->count > 0) {
            $date = '';
            foreach ($messageDataProvider->getModels() as $messageData) {
                if (!empty($messageData['to_profile_image']) && file_exists('../../frontend/web/upload/user/profile_pic/' . $messageData['to_profile_image'])) {
                    $messageData['to_profile_image'] = Yii::$app->urlManagerFrontend->createAbsoluteUrl('') . 'upload/user/profile_pic/' . $messageData['to_profile_image'];
                } else {
                    $messageData['to_profile_image'] = Yii::$app->urlManagerFrontend->createAbsoluteUrl('') . 'images/default-profile.png';
                }
                if (!empty($messageData['from_profile_image']) && file_exists('../../frontend/web/upload/user/profile_pic/' . $messageData['from_profile_image'])) {
                    $messageData['from_profile_image'] = Yii::$app->urlManagerFrontend->createAbsoluteUrl('') . 'upload/user/profile_pic/' . $messageData['from_profile_image'];
                } else {
                    $messageData['from_profile_image'] = Yii::$app->urlManagerFrontend->createAbsoluteUrl('') . 'images/default-profile.png';
                }
                $res[] = $messageData;
            }
        }
        $messageDataProvider->setModels($res);
        return $messageDataProvider;
    }     

}
