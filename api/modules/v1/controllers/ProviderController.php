<?php
namespace api\modules\v1\controllers;

use Yii;
use api\components\Controller;
use common\models\User;
use common\models\base\BaseLoginForm;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\data\ActiveDataProvider;
use common\models\FavouriteList;
use common\models\Appointment;
use common\models\ReviewRating;

/**
 * User Controller API
 *
 */
class ProviderController extends Controller {

    public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
    ];

    public function behaviors() {
        return ArrayHelper::merge(parent::behaviors(), [
                    'authenticator' => [
                        'except' => [
                        ]
                    ],
        ]);
    }
    /**
     * Search Providers
     * @return DataProviders
     */
    public function actionIndex() {
        $params = \yii::$app->request->get();
        return User::searchProviders($params);
    }
    public function actionFavouriteProviders() {
        $params = \yii::$app->request->get();
        return User::favouriteProviders($params);
    }
    /**
     * ProviderDetail
     * @param type $id
     * @return Provider Data
     */
    public function actionView($id) {
        return User::providerDetail($id);
    }
    /**
     * Mark  rovider favourite and unfavourite 
     * @param type $id
     * @return boolean
     */
    public function actionFavourite($id) {
        $rawData = \Yii::$app->request->getRawBody();
        $post = json_decode($rawData,true);
        $post['provider_id'] = $id;
        $post['user_id'] =  \Yii::$app->user->id;
        return FavouriteList::markFavourite($post);
    }
    /**
     * Providers Sales History
     * @param type $id
     * @return Dataprovider
     */
    public function actionSalesHistory($id){
        $params = \Yii::$app->request->get();
        return Appointment::providerCustomers($id,$params);
        
    }
    /**
     * Providers upcoming appointment
     * @param type $id
     * @return Dataprovider
     */
    public function actionUpcomingAppointment($id) {
        $params = \Yii::$app->request->get();
        $params['apointment_type'] = 'upcoming';
        return Appointment::providerApppointments($id,$params);
    }
    /**
     * Providers completed appointment
     * @param type $id
     * @return Dataprovider
     */
    public function actionCompletedAppointment($id) {
        $params = \Yii::$app->request->get();
        $params['apointment_type'] = 'completed';
        return Appointment::providerApppointments($id,$params);
    }
    public function actionReview($id) {
        return ReviewRating::getProvidersReview($id);
    }
}
