<?php

namespace common\models\base;

use Yii;

/**
 * This is the model class for table "package_services".
 *
 * @property integer $id
 * @property integer $service_id
 * @property integer $package_id
 * @property string $start_time
 * @property string $end_time
 * @property string $minutes_duration
 * @property string $service_price
 * @property integer $parent
 *
 * @property Services $parent0
 * @property Packages $package
 * @property Services $service
 * @property Packages[] $packages
 */
class BasePackageServices extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'package_services';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['package_id'], 'integer'],
            [['service_price'], 'number'],
            [['start_time', 'end_time'], 'string', 'max' => 30],
            [['minutes_duration'], 'string', 'max' => 20],
            [['package_id'], 'exist', 'skipOnError' => true, 'targetClass' => \common\models\Packages::className(), 'targetAttribute' => ['package_id' => 'package_id']],            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'package_id' => 'Package ID',
            'start_time' => 'Start Time',
            'end_time' => 'End Time',
            'minutes_duration' => 'Minutes Duration',
            'service_price' => 'Service Price',            
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getParent0()
    {
        return $this->hasOne(\common\models\Services::className(), ['category_id' => 'parent']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPackage()
    {
        return $this->hasOne(\common\models\Packages::className(), ['package_id' => 'package_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getService()
    {
        return $this->hasOne(\common\models\Services::className(), ['category_id' => 'service_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPackages()
    {
        return $this->hasMany(\common\models\Packages::className(), ['package_service_id' => 'id']);
    }

    /**
     * @inheritdoc
     * @return \common\models\query\PackageServicesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\PackageServicesQuery(get_called_class());
    }
}
