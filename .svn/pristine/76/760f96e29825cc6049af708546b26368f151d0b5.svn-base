<?php
/************************************************************************************************************************//**
 *  Module Name: Common
 *  Model Name: RequestService.php
 *  Created: Codian Team
 *  Description: This will handle all the db related operations for service request for api,frontend and admin modules
 ***************************************************************************************************************************/

namespace common\models;

use Yii;
use common\models\base\BaseRequestService;
use common\models\query\RequestServiceQuery;
use yii\helpers\ArrayHelper;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;

/**
 * This is the model class for table "request_service".
 *
 * @property integer $id
 * @property string $category_name
 * @property integer $provider_id
 * @property string $created_at
 * @property string $updated_at
 */
class RequestService extends BaseRequestService
{
     public function rules() {
        return ArrayHelper::merge(
                    parent::rules(), [
                        [['category_name','provider_id'], 'trim'],
                        ['category_name', 'required'],
                        [['category_name'], 'checkIfExist']
        ]);
    }

    public function attributeLabels() {
        return ArrayHelper::merge(
                        parent::attributeLabels(), [
                            
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
                    ActiveRecord::EVENT_BEFORE_INSERT => ['created_at', 'updated_at'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_at'],
                ],
                'value' => new Expression('NOW()'),
            ],
        ];
    }
    
    /**
     * Validation function to check if service already exists
     */
    public function checkIfExist($attribute, $params) {
        
        $category_name = $this->category_name;

        $checkUniqueExistence = self::find()->where('category_name = :category_name',[':category_name' => $category_name])->One();
        
        if (!empty($checkUniqueExistence)) {

            $this->addError('category_name', 'Requested Service already exists');
        }
    }    
    
    /**
     * Save the request service in the table
     * @param null
     * @return type True|false
     */
    public function saveRequestService() {
        $model = new RequestService();
        $model->category_name = $this->category_name;
        $model->provider_id = Yii::$app->user->id;
        
        if($model->save(false)) {
            return TRUE;
        }
        return FALSE;
    }
}

/*************************************************************************************************************************************/
// EOF: RequestService.php
/*************************************************************************************************************************************/