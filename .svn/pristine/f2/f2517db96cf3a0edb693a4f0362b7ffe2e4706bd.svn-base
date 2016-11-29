<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

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
class PackageServices extends base\BasePackageServices
{    
    public $preparation_status;
   /**
     * @inheritdoc
     */
    public function rules() {
        return ArrayHelper::merge(
                        parent::rules(), [                    
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
     * @return \yii\db\ActiveQuery
     */
    public function fields() {
        return ArrayHelper::merge(parent::fields(), [
            'preparation_status'
        ]);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPackage()
    {
        return $this->hasOne(Packages::className(), ['package_id' => 'package_id']);
    }    

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPackages()
    {
        return $this->hasMany(Packages::className(), ['package_service_id' => 'id']);
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAppointmentsPackageService() {
        return $this->hasOne(Appointment::className(), ['package_id' => 'package_id']);
    }
    
    public static function getPreparationStatus($params) {
        $columns = [
            "p.package_id",
            "p.preparation_status",
            "package_services.start_time",
            "package_services.end_time",
            "package_services.minutes_duration",
            'package_services.service_price'
        ];
        return PackageServices::find()
                        ->select($columns)
                        ->where([
                            'p.status' => 'Active',
                            'p.parent' => $params['category_id'],
                            'p.service_id' => $params['sub_category_id']
                            ])
                        ->join('join', 'packages p', 'package_services.package_id = p.package_id')
                        ->groupBy(['package_services.minutes_duration', 'package_services.service_price'])
                        ->all();
    }
    public static function getAvailableTime($params) {
        $result = [];
        $columns = [
            "package_services.start_time",
            "package_services.package_id"
        ];
        $times = PackageServices::find()
                ->select($columns)
                ->where([
                    'p.status' => 'Active',
                    'p.service_id' => $params['sub_service_id'],
                    'package_services.minutes_duration' => $params['service_time'],
                    'package_services.service_price' => $params['service_price']
                ])
                ->join('join', 'packages p', 'package_services.package_id = p.package_id')
                ->all();
        if (!empty($times)) {
            foreach ($times as $time) {
                $time['start_time'] = date("H:i:s", strtotime($time['start_time']));
                $result[] = $time;
            }
        }
        return $result;
    }  

}
