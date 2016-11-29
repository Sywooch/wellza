<?php

namespace common\models;

use Yii;
use common\models\base\BasePortfolio;
use common\models\query\PortfolioQuery;
use yii\web\UploadedFile;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\helpers\ArrayHelper;
use yii\imagine\Image;
use Imagine\Gd;
use Imagine\Image\Box;
use Imagine\Image\BoxInterface;

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
class Portfolio extends BasePortfolio {
    
    /**
     * @inheritdoc
     */
    public function rules() {
        return ArrayHelper::merge(
                        parent::rules(), [
                    [['media_url'], 'checkMediaValidate'],
                    [['id'], 'required', 'on' => 'delete'],
                    [['id'], 'integer', 'on' => 'delete'],
        ]);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return ArrayHelper::merge(
                        parent::attributeLabels(), [
        ]);
    }

    /**
     * @inheritdoc
     */
    public function scenarios() {
        $scenarios = parent::scenarios();
        $scenarios['delete'] = ['id'];
        return $scenarios;
    }

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            [
                'class' => TimestampBehavior::className(),
                'createdAtAttribute' => 'created_at',
                'updatedAtAttribute' => 'updated_at',
                'attributes' => [
                    \yii\db\ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    \yii\db\ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value' => new Expression('NOW()'),
            ],
        ];
    }
    
    public function fields() {
        return array_merge(parent::fields(),[
            'media_url'=>function($model){
                $url = \yii\helpers\Url::to('@web', true);
                if (!empty($model->media_url) && file_exists( './'.$model->media_url)) {
                    return $url . '/' . $model->media_url;
                } else {
                    return $url . '/uploads/portfolio/default-image.png';
                }
            },
            'video_thumbnails'=>function($model){
                $url = \yii\helpers\Url::to('@web', true);
                if (!empty($model->video_thumbnails) && file_exists( './'.$model->video_thumbnails)) {
                    return   $url . '/' . $model->video_thumbnails;
                } else {
                    return   $url . '/uploads/portfolio/default-video-thumbnail.png';
                }
            },
        ]);
    }

    /**
     * Validation to validate the uploaded media image or video 
     */
    public function checkMediaValidate($attribute, $params) {
        $type = $this->media_type;

        $media_url = $this->media_url;

        if ($type == 'Image') {
            if (!preg_match("/\.(png|jpg|jpeg)$/", $media_url)) {
                $this->addError($attribute, 'Uploaded media is not valid.');
            }
        }

        if ($type == 'Video') {

            if (!preg_match("/\.(mp4|quicktime|mov|3gpp|mpeg|x-quicktime|x-m4v)$/", $media_url)) {
                $this->addError($attribute, 'Uploaded media is not valid.');
            }
        }
    }

    /**
     * @inheritdoc
     * @return \common\models\query\PortfolioQuery the active query used by this AR class.
     */
    public static function find() {
        return new \common\models\query\PortfolioQuery(get_called_class());
    }

    /**
     * Get the portfolio of the client or service provider
     */
    public static function getPortfolioData($id) {
        $returndata = self::find()->select("id as media_id,media_type,media_url,video_thumbnails,image_thumbnail")->ById($id)->asArray()->all();
        //$base_url = \yii\helpers\Url::to('@web', true).'/frontend/web/';
        $base_url = Yii::$app->urlManagerFrontEnd->createUrl('/');
        $base_path = \Yii::getAlias('@frontend') . '/web/';
        
        for ($i = 0; $i < count($returndata); $i++) {
            //echo $url . $returndata[$i]['media_url'];die('###');
            $image_path = $base_path . $returndata[$i]['media_url'];
            
            if(file_exists($image_path)) {
                
                $returndata[$i]['media_url'] = $base_url . $returndata[$i]['media_url'];
                $returndata[$i]['image_thumbnail'] = $base_url . $returndata[$i]['image_thumbnail'];
                
                $data = getimagesize($returndata[$i]['media_url']);
                $returndata[$i]['media_height'] = $data[1];
                $returndata[$i]['media_width'] = $data[0];
                $video_thumbnail = $returndata[$i]['video_thumbnails'];
                if (!empty($video_thumbnail)) {
                    $returndata[$i]['video_thumbnails'] = $base_url . $returndata[$i]['video_thumbnails'];
                }
            } else {
                
                $returndata[$i]['media_url'] = '';
                $returndata[$i]['image_thumbnail'] = '';
                $returndata[$i]['media_height'] = '';
                $returndata[$i]['media_width'] = '';
                $video_thumbnail = $returndata[$i]['video_thumbnails'];
                if (!empty($video_thumbnail)) {
                    $returndata[$i]['video_thumbnails'] = $base_url . $returndata[$i]['video_thumbnails'];
                }
            }            
        }
        
        return $returndata;
    }

    /**
     * Add the portfolio data for the client or service provider
     */
    public function addPortfolioData($id, $media_type = null, $file) {
        $portfolio = new Portfolio();
        $media_type = $this->media_type;
        $dir = './uploads/portfolio/' . $id . '/';
        $dirpath = '';

        if ($media_type == "Image") {
            $dirpath = $dir . 'images/';

            if (!is_dir($dirpath)) {

                \yii\helpers\FileHelper::createDirectory($dirpath, 0755, true);
            }
        }

        if ($media_type == "Video") {
            $dirpath = $dir . 'videos/';

            $dirpath_vthumb = $dir . 'videos/thumbnail/';
            if (!is_dir($dirpath)) {

                \yii\helpers\FileHelper::createDirectory($dirpath, 0777, true);
            }
            if (!is_dir($dirpath_vthumb)) {

                \yii\helpers\FileHelper::createDirectory($dirpath_vthumb, 0777, true);
            }
        }

        $dirpath = $dirpath . time() . '_';
        $basename = preg_replace('/\s+/', '_', $file->baseName);

        $file->saveAs($dirpath . $basename . '.' . $file->extension);

        $portfolio->user_id = $id;
        $portfolio->media_type = $media_type;
        $dirpath = ltrim($dirpath, '.');
        $portfolio->media_url = $dirpath . $basename . '.' . $file->extension;

        if ($media_type == "Video") {
            $video = $dirpath . $basename . '.' . $file->extension;
            $video_thumbnails = $this->createVideoThubnails($dirpath_vthumb, $video);
            if (!empty($video_thumbnails)) {
                $portfolio->video_thumbnails = $video_thumbnails;
            }
        }

        if ($portfolio->save()) {

            $returndata = self::getPortfolioData($id, $media_type);
            return $returndata;
        } else {
            return false;
        }
    }
    
    /**
     * Add the portfolio data for the client or service provider in the website
     */
    public function addPortfolioDataWeb($id = null,$file = null) {
        $portfolio = new Portfolio();
        $media_type = $file->type;
        $media_type_data = explode("/",$media_type);
        $type = $media_type_data[0];
        $dirpath = 'uploads/portfolio/'. $id .'/images/';
        $dirpath_v = 'uploads/portfolio/'. $id .'/videos/';
        $dirpath_thumb = 'uploads/portfolio/' .$id . '/images/thumb/';
        
        $this->crop_images($portfolio,$dirpath,$dirpath_thumb,$dirpath_v, $id,$type);
        
        if ($portfolio->save(false)) {
            $returndata['id'] = $portfolio->id;
            return json_encode($returndata);
        } else {
            return false;
        }
        
    }
    
    /***
     * Crop the profile image and its thumbnail
     * @params $portfolio,$dirpath, $dirpath_thumb,$dirpath_v, $user_id,$type
     * @return none
     * ***/
    public function crop_images($portfolio = null, $dirpath = null, $dirpath_thumb = null,$dirpath_v = null, $user_id = null,$type = null) {
        
        if (!empty($this->media_url->tempName)) {
            $media_name = str_replace(' ', '_', $this->media_url->name); 
            if ($type == "image") {                
                $temppath = \Yii::getAlias('@frontend') . '/web/' . $dirpath;
                $temppath_thumb = \Yii::getAlias('@frontend') . '/web/' . $dirpath_thumb;
                if (!is_dir($temppath)) {
                    \yii\helpers\FileHelper::createDirectory($temppath, 0755, true);
                }
                if (!is_dir($temppath_thumb)) {
                    \yii\helpers\FileHelper::createDirectory($temppath_thumb, 0755, true);
                }
                               
                $original_image = \Yii::getAlias('@frontend') . '/web/' . $dirpath . $media_name;
                $thumbnail_image = \Yii::getAlias('@frontend') . '/web/' . $dirpath_thumb .'thumb_'.$media_name;
                $this->media_url->saveAs($original_image);
                Image::thumbnail($original_image, 242,242)->save(Yii::getAlias($thumbnail_image), ['quality' => 80]);
                //Image::getImagine()->open($original_image)->thumbnail(new Box(242, 242))->save($thumbnail_image , ['quality' => 90]);
                $portfolio->media_url = $dirpath . $media_name;
                $portfolio->image_thumbnail = $dirpath_thumb .'thumb_'.$media_name;
            }
            
            //If video is uploaded
            if ($type == "video") {
                $temp_vpath = \Yii::getAlias('@frontend') . '/web/' . $dirpath_v;
                
                $temp_vpaththumb = \Yii::getAlias('@frontend') . '/web/' . $dirpath_v . 'thumbnail/';
                if (!is_dir($temp_vpath)) {

                    \yii\helpers\FileHelper::createDirectory($dirpath, 0777, true);
                }
                if (!is_dir($temp_vpaththumb)) {

                    \yii\helpers\FileHelper::createDirectory($temp_vpaththumb, 0777, true);
                }
                
                $video = \Yii::getAlias('@frontend') . '/web/' .$dirpath_v . $media_name;
                $this->media_url->saveAs($video);
                $portfolio->media_url = $dirpath_v . $media_name;
                $video_thumbnails = $this->createVideoThubnails($dirpath_v, $video);
                    
                if (!empty($video_thumbnails)) {
                    $portfolio->video_thumbnails = $video_thumbnails;                    
                }
            }
            $portfolio->user_id = $user_id;
            $portfolio->media_type = ucfirst($type);
            
        }        
    }

    /**
     * create video thumbnails
     */
    public function createVideoThubnails($dirpath_vthumb, $video) {
        //$path = \Yii::getAlias('@webroot');
        //$video = $path . $video;
        //$dirpath_vthumb = ltrim($dirpath_vthumb, '.');
        $path = $dirpath_vthumb . 'thumbnail/'. time() . '_videothumb.jpg';
        $thumbnail = \Yii::getAlias('@frontend') . '/web/'.$path;
        $second = 15; //specify the time to get the screen shot at (can easily be randomly generated)
        //codiant server ffmpeg path
        $ffmpeg = "C:\\ffmpeg\\bin\\ffmpeg.exe";
        //echo "ffmpeg -i $video -an -ss $second -t 00:00:01 -r 1 -y -s 320x240 -vcodec mjpeg -f mjpeg $thumbnail 2>&1";die;
        //echo "$ffmpeg -i $video -an -ss $second -t 00:00:01 -r 1 -y -s 320x240 -vcodec mjpeg -f mjpeg $thumbnail 2>&1";die;
        //ffmpeg -i input.flv -ss 00:00:14.435 -vframes 1 out.png
        $command = "$ffmpeg -i $video -an -ss $second -t 00:00:01 -r 1 -y -s 242x242 -vcodec mjpeg -f mjpeg $thumbnail 2>&1";
        
        if (exec($command)) {
            return $path;
        } else {
            return null;
        }
    }

    /**
     * Delete portfolio of a provider
     */
    public static function deletePortfolioItem($item_id, $access_token) {
        $auth = \common\models\Authtoken::findIdentityByAccessToken($access_token);
        $model = self::find()->ByItemId($auth->user_id, $item_id)->one();
        if (!empty($model)) {
            return $model->delete();
        } else {
            return null;
        }
        return;
    }
}