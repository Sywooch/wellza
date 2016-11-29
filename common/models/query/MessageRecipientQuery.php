<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\MessageRecipient]].
 *
 * @see \common\models\Message
 */
class MessageRecipientQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return \common\models\MessageRecipient[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\MessageRecipient|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
    
    /**
     * @inheritdoc
     * @return \common\models\base\BasePackages|array|null
     */
    public function ByIds($from_user_id = null ,$to_user_id = null)
    {   $this->where('(message_recipient.from_user_id = :from_user_id AND message_recipient.to_user_id = :to_user_id) OR (message_recipient.from_user_id = :to_user_id AND message_recipient.to_user_id = :from_user_id)',[':from_user_id' => $from_user_id,':to_user_id' => $to_user_id]);
        return $this;
    }
}
