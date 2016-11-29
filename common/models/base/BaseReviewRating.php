<?php
/* * ********************************************************************************************************************* *//**
 *  Model Name: BaseReviewRating.php
 *  Created: Codian Team
 *  Description: It mainly consists of the properties rules and attributlabels.Contains the relations with other models and 
 * the query model for queries.Its a base class will be inherited by its child classes whenever needed 
 * ************************************************************************************************************************* */

namespace common\models\base;

use Yii;

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
class BaseReviewRating extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'appointment_review_rating';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['appointment_id','trim'],
            [['rating'], 'number'],
            [['rating_date', 'created_at', 'updated_at'], 'safe'],
            [['provided_by', 'provided_to'], 'integer'],
            [['rating_given_by'], 'string'],
            [['review'], 'string', 'max' => 300],
            //[['provider_to'], 'exist', 'skipOnError' => true, 'targetClass' => common\models\User::className(), 'targetAttribute' => ['provider_to' => 'id']],
            //[['provider_by'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\User::className(), 'targetAttribute' => ['provider_by' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'appointment_id' => 'Appointment ID',
            'rating' => 'Rating',
            'review' => 'Review',
            'rating_date' => 'Rating Date',
            'provided_by' => 'Provided By',
            'provided_to' => 'Provided To',
            'rating_given_by' => 'Rating Given By',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }   
}

/* * ********************************************************************************************************************************** */
// EOF: BaseReviewRating.php
/* * ********************************************************************************************************************************** */