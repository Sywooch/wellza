<?php

/* * ********************************************************************************************************************* *//**
 *  Model Name: ReviewRating.php
 *  Created: Codian Team
 *  Description: Manages the crud operations for review and rating for both providers and client.It inherits the properties
 *  of the base class rules and attributlabels. 
 * ************************************************************************************************************************* */

namespace common\models;

use Yii;
use common\models\base\BaseReviewRating;
use common\models\query\RequestServiceQuery;
use yii\helpers\ArrayHelper;
use yii\base\NotSupportedException;
use yii\db\ActiveRecord;
use yii\behaviors\TimestampBehavior;
use yii\db\Expression;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "appointment_review_rating".
 *
 * @property integer $id
 * @property string $rating
 * @property string $review
 * @property string $rating_date
 * @property integer $provider_by
 * @property integer $provider_to
 * @property string $rating_given_by
 * @property string $created_at
 * @property string $updated_at
 *
 * @property User $providerTo
 * @property User $providerBy
 */
class ReviewRating extends BaseReviewRating {

    public $profile_image;
    public $customer_name;

    public function rules() {
        return ArrayHelper::merge(
                        parent::rules(), [
                    [['appointment_id', 'rating', 'rating_date', 'provided_by', 'provided_to', 'review'], 'required'],
                    [['appointment_id'], 'isAlreadyRated', 'on' => 'app']
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
    public function fields() {
        return ArrayHelper::merge(parent::fields(), [
                    'profile_image', 'customer_name'
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
     * @return \yii\db\ActiveQuery
     */
    public function getUserClient() {
        return $this->hasOne(User::className(), ['id' => 'provider_to']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUserProvider() {
        return $this->hasOne(User::className(), ['id' => 'provider_by']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAppointmentId() {
        return $this->hasOne(\common\models\Appointment::className(), ['appointment_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \common\models\query\BaseReviewRatingQuery the active query used by this AR class.
     */
    public static function find() {
        return new \common\models\query\ReviewRatingQuery(get_called_class());
    }

    /**
     * Save the data for the rating given by client to provider
     * @params user_id,rating_given_by
     * @return True|False
     */
    public function saveReiewRating($user_id = null, $rating_given_by = null) {
        $model = new ReviewRating();
        $model->appointment_id = $this->appointment_id;
        $model->rating = $this->rating;
        $model->review = $this->review;
        $model->provided_by = $user_id;
        $model->provided_to = $this->provided_to;
        $currentdate = date('Y-m-d');
        $model->rating_date = $currentdate;
        $model->rating_given_by = $rating_given_by;
        $model->status = 'rated';

        if ($model->save()) {
            return true;
        }
        return null;
    }

    /**
     * Get all the reviews count for the provider giben by cleint
     * @params provider_id,rating_given_by
     * @return count
     */
    public static function getProviderReviews($provider_id = null, $rating_given_by = null) {
        $returndata = array();
        $results = self::find()->ByIDNRating($provider_id, $rating_given_by)->all();
        $i = 0;
        foreach ($results as $data) {
            $returndata[$i]['rating'] = $data->rating;
            $user_data = User::findOne(['id' => $data->provided_by]);
            $provider_data = User::findOne(['id' => $data->provided_to]);
            $returndata[$i]['review_by'] = $user_data->first_name . ' ' . $user_data->last_name;
            $returndata[$i]['review'] = $data->review;
            $profile_image = !empty($provider_data->profile_image) ? '../frontend/web/' . $provider_data->profile_image : $site_url . '/images/default-profile.png';
            $returndata[$i]['provider_image'] = $profile_image;
            if (!empty($data->rating_date)) {
                $date = date_create($data->rating_date);
                $returndata[$i]['rating_date'] = date_format($date, "d M,Y ");
            } else {
                $returndata[$i]['rating_date'] = '';
            }

            $i++;
        }

        return $returndata;
    }
    
    /**
     * Get all the reviews count for the client given by provider
     * @params provider_id,rating_given_by
     * @return count
     */
    public static function getClientReviews($client_id = null, $rating_given_by = null) {
        $returndata = array();
        $results = self::find()->byIDNRatingClient($client_id, $rating_given_by)->all();
        $i = 0;
        foreach ($results as $data) {
            $returndata[$i]['rating'] = $data->rating;
            $user_data = User::findOne(['id' => $data->provided_by]);
            $client_data = User::findOne(['id' => $data->provided_to]);
            $returndata[$i]['review_by'] = $user_data->first_name . ' ' . $user_data->last_name;
            $returndata[$i]['review'] = $data->review;
            $profile_image = !empty($client_data->profile_image) ? '../frontend/web/' . $client_data->profile_image : $site_url . '/images/default-profile.png';
            $returndata[$i]['provider_image'] = $profile_image;
            if (!empty($data->rating_date)) {
                $date = date_create($data->rating_date);
                $returndata[$i]['rating_date'] = date_format($date, "d M,Y ");
            } else {
                $returndata[$i]['rating_date'] = '';
            }

            $i++;
        }

        return $returndata;
    }

    /**
     * 
     * @param type $data
     * @return \common\models\ReviewRating
     */
    public static function saveReview($data) {
        $model = new ReviewRating;
        $model->scenario = 'app';
        $model->load($data, '');
        $model->save();
        return $model;
    }

    /**
     * 
     * @return type
     */
    public function isAlreadyRated() {
        $review = self::find()
                ->where([
                    'appointment_id' => $this->appointment_id,
                    'provided_by' => $this->provided_by,
                    'provided_to' => $this->provided_to
                ])
                ->one();
        if (!empty($review) && !empty($this->rating) && !empty($this->review)) {
            return $this->addError('appointment_id', 'Review already submited.');
        }
    }

    public static function getProvidersReview($providerId) {
        $columns = [
            "appointment_review_rating.id",
            "appointment_review_rating.appointment_id",
            "appointment_review_rating.provided_to",
            "appointment_review_rating.provided_by",
            "appointment_review_rating.rating",
            "appointment_review_rating.review",
            "appointment_review_rating.rating_date",
            "appointment_review_rating.rating_given_by",
            "u.profile_image",
            "CONCAT(u.first_name,' ',u.last_name)AS customer_name"
        ];
        $query = self::find()
                ->select($columns)
                ->where(['provided_to' => $providerId]);
        $query->join('join', 'user u', 'u.id=appointment_review_rating.provided_by');
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10
            ],
        ]);
        if (!empty($dataProvider)) {
            $result = [];
            $url = \yii\helpers\Url::to('@web', true);
            foreach ($dataProvider->getModels() as $review) {
                if (!empty($review['profile_image']) && file_exists('./' . $review['profile_image'])) {
                    $review['profile_image'] = $url . '/' . $review['profile_image'];
                } else {
                    $review['profile_image'] = $url . '/uploads/profile/images/default-profile.png';
                }
                $result[] = $review;
            }
            $dataProvider->setModels($result);
        }
        return $dataProvider;
    }
    
    public static function getReviewCount($attr){
        return self::find()->where($attr)->andWhere(['!=','review',''])->count();
    }
    public static function avgRating($attr){
        return self::find()->where($attr)->average('rating');
    }
    public static function isRated($attr){
        $review =  self::find()->where($attr)->one();
        return (!empty($review))?true:false;
    }

}

/* * ********************************************************************************************************************************** */
// EOF: ReviewRating.php
/* * ********************************************************************************************************************************** */
