<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "master_states".
 *
 * @property integer $state_id
 * @property string $state_name
 * @property string $state_abbrev
 * @property string $countries_id
 */
class BaseMasterStates extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'master_states';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['state_name'], 'string', 'max' => 40],
            [['state_abbrev'], 'string', 'max' => 2],
            [['countries_id'], 'string', 'max' => 11],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'state_id' => 'State ID',
            'state_name' => 'State Name',
            'state_abbrev' => 'State Abbrev',
            'countries_id' => 'Countries ID',
        ];
    }
}
