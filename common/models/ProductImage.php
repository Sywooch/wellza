<?php
namespace common\models;

use Yii;
use common\models\base\BaseProductImage;
use yii\helpers\ArrayHelper;
use yii\web\NotFoundHttpException;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\web\UploadedFile;

class ProductImage extends BaseProductImage
{ 
    /**
     * @inheritdoc
     * @return \common\models\query\PortfolioQuery the active query used by this AR class.
     */
    public static function find() {
        return new query\ProductImageQuery(get_called_class());
    }
    /**
     * @inheritdoc
     */
    public function rules() {
        return ArrayHelper::merge(
            parent::rules(),
            [                
                
            ]);
    }
    
    /**
     * @inheritdoc
     */   
    public function attributeLabels() {
        return ArrayHelper::merge(
            parent::attributeLabels(),
            [
                    
            ]);
    } 
    
    /**
     * @inheritdoc
     */
    public function fields() {
        return array_merge(parent::fields(), [
            'product_image' =>function($model){
                $url = \Yii::$app->urlManagerBackend->baseurl;
                if (!empty($model->product_image) && file_exists('../../backend/web/' . $model->product_image)) {
                    return $url . $model->product_image;
                } else {
                    return $url . '/uploads/products/default-product-image.png';
                }
            }
        ]);
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
    
    /**
     * Save image of a product
     */
    public static function setProductImage($product_image = null,$product_id = null) {
        $model = new ProductImage();
        if(!empty($product_image)) {
             $image_data = self::findAll(['product_id' => $product_id]);
            //$image_data->deleteAll();
            $model->deleteAll('product_id = :product_id', [':product_id' => $product_id]);
            $url = \yii\helpers\Url::to('@web', true);
            if(!empty($image_data)) {
                foreach ($image_data as $data) {
                    $image_path = Yii::$app->basePath.'/web/'.$data->product_image;
                    $image_path = str_replace('\\', '/', $image_path);

                    if(file_exists($image_path)) {
                        unlink($image_path);        

                    }               
                }            
            }        

            $dirpath = './uploads/products/';

            if (!is_dir($dirpath)) {
                \yii\helpers\FileHelper::createDirectory($dirpath, 0755, true);
            }       

            $dirpath = $dirpath . time() . '_';
            $basename = preg_replace('/\s+/', '_', $product_image->baseName);

            $product_image->saveAs($dirpath . $basename . '.' . $product_image->extension);
            $dirpath = ltrim($dirpath, '.');
            $model->product_id = $product_id;
            $model->product_image = $dirpath . $basename . '.' . $product_image->extension;

            if($model->save(false)) {
                return $model->id;
            } 
        }    
        
        return false;               
    }
        
}

