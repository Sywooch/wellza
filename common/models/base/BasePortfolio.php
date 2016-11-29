<?php
namespace common\models\base;

use Yii;
use yii\web\UploadedFile;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
/**
 * This is the model class for table "portfolio".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $media_type
 * @property string $media_url
 * @property string $created_at
 * @property string $updated_at
 *
 * @property User $user
 */
class BasePortfolio extends \yii\db\ActiveRecord
{      
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'portfolio';
    }
        
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            
            [['user_id'], 'integer'],
            [['media_type'], 'string'],
            [['media_url'], 'required'],
            ['media_url', 'file', 'extensions' => ['png', 'jpg', 'jpeg','mp4','quicktime','mov','3gpp','mpeg','x-quicktime','x-m4v'], 'maxSize' => 1024 * 1024 * 20],
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
            'media_type' => 'Media Type',
            'media_url' => 'Media Url',
            'video_thumbnails' => 'Video Thumbnail',
            'image_thumbnail' => 'Image Thumbnail',
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
