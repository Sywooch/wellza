<?php
/************************************************************************************************************************//**
 *  Controller Name: ServiceController.php
 *  Created: Codian Team
 *  Description: This will manage the data flow from view and model and vice versa.Also content function that will be
 * called by ajax.Handle all the operations for the service provider like add services,request for services etc  
 ***************************************************************************************************************************/
namespace frontend\modules\provider\controllers;

use Yii;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Response;
use yii\widgets\ActiveForm;
use yii\web\Session;

class ServiceController extends \frontend\modules\provider\components\Controller
{
    public function actionIndex()
    {   
        $model = new \common\models\Services();
        $request_service = new \common\models\RequestService();
        $services = \common\models\Services::getServices();
        
        if (!empty($services)) {
            $data = Yii::$app->request->post();
            if(!empty($data)) {
                
                $category_id = $data['category_id'];
                if($category_id == 0) {
                    $cat = \common\models\Services::getFirstCategorySubServices();
                    $data = $model->getBySubServices($cat->category_id);
                }
                echo json_encode($data);
                exit();
            }
            
            $returndata = \common\components\Utility::getCategoryWithClass($services);
            return $this->render('service', ['model' => $model, 'returndata' => $returndata,'request_service' => $request_service]);
        }
        
        return $this->render('service',['model' => $model, 'returndata' => $returndata,'request_service' => $request_service]);
    }
    
    /**
     * Add the services for service provider
     */
    public function actionAddService() {
        $data = Yii::$app->request->post();
        $model = new \common\models\ProviderServices();
        $model->load($data);
        $d = json_encode($data);
        //echo '<pre/>';
        //        print_r($data);die('...');       
        //echo '<pre/>';print_r($d);die('...');       
        $model->add_service = json_encode($data);
        $returndata = $model->manageServices(null, 'web');
        
        if($returndata) {
            Yii::$app->session->setFlash('service_message', 'Services added sucessfully!');
        } else {
            Yii::$app->session->setFlash('service_message', 'Services added previously');
        }
        return $this->redirect(['/provider/service']);
    }
    
    /**
     * Add the services for service provider
     */
    public function actionRequestService() {
        //$data = Yii::$app->request->post();
        $model = new \common\models\RequestService();
        $post = Yii::$app->request->post();
        if (Yii::$app->request->isAjax && $model->load($post)) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }        
        $model->load($post);
        //echo '<pre/>'; print_r($model);die('...');
        //if($model->validate()) {
            $returndata = $model->saveRequestService();
        
            if($returndata) {
                Yii::$app->session->setFlash('service_message', 'Services requested sucessfully!');
            } else {
                Yii::$app->session->setFlash('service_message', 'Error while requesting');
            }
            return $this->redirect(['/provider/service']);
        //}
        
        //return $this->redirect(['/provider/service']);
    }
    
    
    /********************************************** Ajax Driven functions ******************************************************************* */
    /*************************************************************************************************************************************** */

    /**
     * Callback for social signup
     */
    public function actionLoadSubcategory() {
        $data = Yii::$app->request->post();
        $model = new \common\models\Services();
        
        $category_id = $data['category_id'];
        $returndata = $model->getBySubServices($category_id);
              
        echo json_encode($returndata);
        die;
    }

}

/*************************************************************************************************************************************/
// EOF: ServiceController.php
/*************************************************************************************************************************************/
