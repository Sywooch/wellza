<?php

namespace api\components;

use yii;

final class Utility {

    public static function getMsgParam ($key)
    {
        return \yii::$app->params['Message'][$key];
    }
    public static function getSellerParam ($key)
    {
        return \yii::$app->params['Message']['sellar_notify'][$key];
    }
    public static function getBuyerParam ($key)
    {
        return \yii::$app->params['Message']['buyer_notify'][$key];
    }

    public static function getParam ($key)
    {
        return Yii::$app->params[$key];
    }
    
    public static function getUserId ()
    {
        return Yii::$app->user->id;
    }
    public static function getUserName ()
    {
        return Yii::$app->user->username;
    }


    public static function apiError($errorCode, $message) {
        Yii::$app->response->statusCode = $errorCode;
        return ['message' => $message];
        
    }

    public static function apiSuccess($message) {
       
        Yii::$app->response->statusCode = 200;
        return [['message' => \yii::$app->params['Message']['success'][$message]]];
    }
    public static function apiResponseError($message) {
        Yii::$app->response->statusCode = 402;
        return [['message' => $message]];
    }
    public static function setLocalTimeZone($timeZone, $dateTime) {
        if (!empty($timeZone) && !empty($dateTime)) {
            $serverTimezone = date_default_timezone_get();
            $date = new \DateTime($dateTime, new \DateTimeZone($serverTimezone)); //time zone & date from ios / android
            $date->setTimezone(new \DateTimeZone($timeZone));
            return $date->format(Yii::$app->params['dateFormatToShow']);
        } else
            return false;
    }

    public static function setServerTimeZone($timeZone, $dateTime) {
        if (!empty($timeZone) && !empty($dateTime)) {
            $serverTimezone = date_default_timezone_get();
            $date = new \DateTime($dateTime, new \DateTimeZone($timeZone)); //time zone & date from ios / android
            $date->setTimezone(new \DateTimeZone($serverTimezone));
            return $date->format('Y-m-d H:i:s');
        } else
            return false;
    }

    public static function checkProfileImageExist($profilePic) {
        $src = yii::getAlias('@user_default_image');
        if (!empty($profilePic) && file_exists('./uploads/profile_pic/' . $profilePic)) {
            $src = yii::getAlias('@profile_pic') . '/' . $profilePic;
        }
        return $src;
    }
    public static function checkProfileThumbImageExist($profilePic) {
        $src = yii::getAlias('@user_default_image');
        if (!empty($profilePic) && file_exists('./uploads/profile_pic/' . $profilePic)) {
            $src = yii::getAlias('@profile_pic'). '/thumb/' . $profilePic;
        }
        return $src;
    }
    public static function checkThumbImageExist($pic, $folder) {
        $src = yii::getAlias('@user_default_image');
        if (!empty($pic) && file_exists('./uploads/'.$folder.'/' . $pic)) {
            $src = yii::getAlias('@api_image_upload').'/'.$folder.'/thumb/' . $pic;
        }
        return $src;
    }
    
  
    public static function checkImageExist($pic, $folder) {
       $src = yii::getAlias('@user_default_image');
        if (!empty($pic) && file_exists('./uploads/'.$folder.'/' . $pic)) {
            $src = yii::getAlias('@api_image_upload').'/'.$folder.'/' . $pic;
        }
        return $src;
    }
    public static function checkScannedImageExist($scannedPic) {
        $src = yii::getAlias('@user_default_scanned_image');
        if (!empty($scannedPic) && file_exists('./uploads/scanned_id/' . $scannedPic)) {
            $src = yii::getAlias('@scanned_id') . '/' . $scannedPic;
        }
        return $src;
    }
    
    
    public static function thumbnailCreate($param = array()){
        $source = './uploads/'.$param['folder'].'/';
        $destination = './uploads/'.$param['folder'].'/thumb/';
        $image = $param['image'];
        $thumbWidth = 250;
        $thumbHeight = 250;
        self::createThumb($source, $destination, $image, $thumbWidth, $thumbHeight);
    }

    public static function createThumb($source, $destination, $img, $thumbWidth, $thumbHeight) {
        $imgData = getImageSize($source . $img);
        
        $sType = $imgData['mime'];
        $sWidth = $imgData[0];
        $sHeight = $imgData[1];
        switch ($sType) {
            case 'image/gif':
                $simg = imagecreatefromgif($source . $img);
                break;

            case 'image/jpg': case 'image/jpeg':
                $simg = imagecreatefromjpeg($source . $img);

                break;
            case 'image/png':
                $simg = imagecreatefrompng($source . $img);
                break;
        }
      
        
        $dimg = imagecreatetruecolor($thumbWidth, $thumbHeight);
        //$dest="upload/dest/man3.jpg";
        imagecopyresampled($dimg, $simg, 0, 0, 0, 0, $thumbWidth, $thumbHeight, $sWidth, $sHeight);


        switch ($sType) {
            case 'image/gif':
                imagegif($dimg, $destination . $img);
                break;

            case 'image/jpg': case 'image/jpeg':
                imagejpeg($dimg, $destination . $img);

                break;
            case 'image/png':
                imagepng($dimg, $destination . $img);
                break;
        }

        imagedestroy($dimg);
        imagedestroy($simg);
    }

    public static function saveBase64Image($pic, $thumbPath, $imagePath) {
        $thumbWidth = 150;
        $thumbHeight = 150;
        $data = $pic;
        $data = substr($data, 1 + strrpos($data, ','));
        
        $randomString = substr(str_shuffle("abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 5);
        $imageName = $randomString . time();
        $imageName = $imageName . '.jpg';
        $file = $imagePath . $imageName;
        //$thumbImagePath = '../../api/web/uploads/profile_pic/'. $imageName;
        if (!is_dir($thumbPath)) {
            mkdir($thumbPath, 0777, TRUE);
        }
        if (!is_dir($imagePath)) {
            mkdir($imagePath, 0777, TRUE);
        }
        // write the decoded file
        $save = file_put_contents($file, base64_decode($data));
        if ($save) {
           // @Utility::createThumb($imagePath, $thumbPath, $imageName, $thumbWidth, $thumbHeight);
            //@Utility::createThumb('./' . $path, './' . $path . '/thumb', $filename, 150, 150);
            return $imageName;
        } else {
            return false;
        }
    }

    public static function changeImageName($fileName) {
        $ext = pathinfo($fileName, PATHINFO_EXTENSION);
        $uniqueName = uniqid() . "-" . time();
        $newName = str_replace($fileName, $uniqueName, $fileName) . "." . $ext;
        return $newName;
    }
    
    public static function sendToAndroidUsers($androidUsers, $message, $responseData) {
            $gcm = Yii::$app->gcm;
            if (!is_array($androidUsers)) {
                $result = $gcm->send($androidUsers, strip_tags($message),
                    $responseData,
                    [
                        'timeToLive' => 3
                    ]
                );
             
            } else {
                
                $result = $gcm->sendMulti(
                    $androidUsers,
                    strip_tags($message),$responseData,
                    [
                        'timeToLive' => 3
                    ]
                );
            }
    }
    
    public static function sendToIosDevelopment($iosDevelopment, $message, $responseData) {
        \Yii::$app->apns->environment=\bryglen\apnsgcm\Apns::ENVIRONMENT_SANDBOX;
        \Yii::$app->apns->pemFile='Mykakak_Cert.pem';
        $apns = \Yii::$app->apns;
        if (!is_array($iosDevelopment)) {
            $apns->send($iosDevelopment, strip_tags($message),
                        $responseData,
                        [
                          'sound' => 'default',
                          'badge' => 1
                        ]
                    );
        } else {
            $apns->sendMulti($iosDevelopment, strip_tags($message),
                $responseData,
                [
                  'sound' => 'default',
                  'badge' => 1
                ]
            );
        }
    }
    
    public static function sendToIosProduction($iosProduction, $message, $responseData) {
        \Yii::$app->apns->environment=\bryglen\apnsgcm\Apns::ENVIRONMENT_PRODUCTION;
        \Yii::$app->apns->pemFile='Mykakak_Cert.pem';
        $apns = \Yii::$app->apns;
        if (!is_array($iosProduction)) {
            $apns->send($iosProduction, strip_tags($message),
                        $responseData,
                        [
                          'sound' => 'default',
                          'badge' => 1
                        ]
                    );
        } else {
            $apns->sendMulti($iosProduction, strip_tags($message),
                $responseData,
                [
                  'sound' => 'default',
                  'badge' => 1
                ]
            );
        }
    }
    
    public static function sendToMulti($androidUsers, $iosDevelopment, $iosProduction, $message, $responseData) {
        if (!empty($androidUsers)) {
            Utility::sendToAndroidUsers($androidUsers, $message, $responseData);
        }
        if (!empty($iosDevelopment)) {
            Utility::sendToIosDevelopment($iosDevelopment, $message, $responseData);
        }
        if (!empty($iosProduction)) {
            Utility::sendToIosProduction($iosProduction, $message, $responseData);
            
        }
    }
    
    
     public static function getAddressByLatlang($lat, $lang) {
        $geolocation = floatval($lat) . ',' . floatval($lang);
        $request = 'http://maps.googleapis.com/maps/api/geocode/json?latlng=' . $geolocation . '&sensor=false';
        $file_contents = file_get_contents($request);
        $json_decode = json_decode($file_contents);
        if(!empty($json_decode->results[0]->formatted_address)){
            return $json_decode->results[0]->formatted_address;
        }else{
            return false;
        }
    }
    
    public static function sendPushNotification($id,$message,$responseData)
    {
        $userDevice = \common\models\User::findUserAndDevice($id);
        if (!empty($userDevice)) {
            if (is_array($id)) {
                $androidUsers = [];
                $iosDevelopment = [];
                $iosProduction = [];
                foreach ($userDevice as $device) {
                    if ($device['device_type'] === 'android') {
                        $androidUsers[] = $device['device_id'];
                    } elseif ($device['certification_type'] === 'development') {
                        $iosDevelopment[] = $device['device_id'];
                    } else {
                        $iosProduction[] = $device['device_id'];
                    }
                }
                Utility::sendToMulti($androidUsers, $iosDevelopment, $iosProduction, $message, $responseData);
            } else {
                
                if ($userDevice['device_type'] === 'android') {
                    Utility::sendToAndroidUsers($userDevice['device_id'], $message, $responseData);
                } elseif ($userDevice['certification_type'] === 'development') {
                    Utility::sendToIosDevelopment($userDevice['device_id'], $message, $responseData);
                } else {
                    Utility::sendToIosProduction($userDevice['device_id'], $message, $responseData);
                }
            }
        }
        return true;
    }

    public static function sendPushNotificationToMulti($ids,$message,$responseData)
    {  
        $userDevices = \common\models\UserDevices::getUserDevicesByIds($ids);
        $iosCustomerSandBox = [];
        $iosCustomerLive = [];
        $iosCustomer = [];
        $androidCustomer = [];
        $androidMover = [];
        if(!empty($userDevices)){
            foreach ($userDevices as $userDevice) {
                if ($userDevice['device_type'] == 'android') {
                    if ($userDevice['role_type'] == 'mover') {
                        $androidMover[] = $userDevice['device_id'];
                    } else {
                        $androidCustomer[] = $userDevice['device_id'];
                    }
                } else {
                    if ($userDevice['certification_type'] == 'PROD' || $userDevice['certification_type'] == 'production' || $userDevice['certification_type'] == 'live') {
                        $iosCustomerLive[] = $userDevice['device_id'];
                    } else {
                        $iosCustomerSandBox[] = $userDevice['device_id'];
                    }
                }
            }
            if (!empty($androidMover)) {
                Yii::$app->gcm->apiKey = Yii::$app->params['moverNotificationKey'];
                $gcm = Yii::$app->gcm;
                $resp = $gcm->sendMulti(
                    $androidMover,
                    strip_tags($message),$responseData
                );
                $gcm->resetGcmClient();
            }
            if (!empty($androidCustomer)) {
                Yii::$app->gcm->apiKey = Yii::$app->params['customerNotificationKey'];
                $gcm = Yii::$app->gcm;
//                \yii\helpers\VarDumper::dump($androidCustomer);die;
                $resp = $gcm->sendMulti(
                    $androidCustomer,
                    strip_tags($message),$responseData
                );
                $gcm->resetGcmClient();
            }
            if (!empty($iosCustomerLive)) {
                \Yii::$app->apns->environment=\bryglen\apnsgcm\Apns::ENVIRONMENT_PRODUCTION;
                \Yii::$app->apns->pemFile='Teleportuj_live.pem';
                $apns = \Yii::$app->apns;
                $apns->sendMulti($iosCustomerLive, strip_tags($message),
                    $responseData,
                    [
                      'sound' => 'default',
                      'badge' => 1
                    ]
                );
            }
            if (!empty($iosCustomerSandBox)) {
                \Yii::$app->apns->environment=\bryglen\apnsgcm\Apns::ENVIRONMENT_SANDBOX;
                \Yii::$app->apns->pemFile='Teleportuj_sandbox.pem';
                $apns = \Yii::$app->apns;
                $apns->sendMulti($iosCustomerSandBox, strip_tags($message),
                    $responseData,
                    [
                      'sound' => 'default',
                      'badge' => 1
                    ]
                );
            }
        }
        return true;
    }
    
     public static function getDistanceInMeters($param) {
        $userLatitude = $param['latFrom'];
        $userLongitude = $param['langFrom'];
        $itemLatitude = $param['latTo'];
        $itemLongitude = $param['langTo'];
        $earthRadius = 6371000;
        $sql = " SELECT (
                    (
                        6373 *
                        acos(
                            cos( radians( '{$userLatitude}' ) ) *
                            cos( radians($itemLatitude ) ) *
                            cos(
                                radians( $itemLongitude ) - radians( '{$userLongitude}' )		
                            ) +
                            sin(radians('{$userLatitude}' ) ) *		
                            sin(radians( $itemLatitude) )
                        )
                        )
                    )  as distance";
        $miles = \yii::$app->db->createCommand($sql)->queryScalar();
        return $miles * 1609.344;
        
    }
    
    public static function getGeoDistance($lat1, $lon1, $lat2, $lon2, $unit) 
        { 
            $theta = $lon1 - $lon2; 
            $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta)); 
            $dist = acos($dist); 
            $dist = rad2deg($dist); 
            $miles = $dist * 60 * 1.1515;
            $unit = strtoupper($unit);
            if ($unit == "K") {
              return ($miles * 1.609344); 
            } else if ($unit == "N") {
                return ($miles * 0.8684);
              } else {
                  return $miles;
                }
        }  
        
    public static function getLatLangByAddress($address) {
        $latlangString = '';
        $Address = urlencode($address);
        $request_url = "http://maps.googleapis.com/maps/api/geocode/xml?address=" . $Address . "&sensor=true";
        $xml = simplexml_load_file($request_url) or die("url not loading");
        $status = $xml->status;
        if ($status == "OK") {
            $Lat = $xml->result->geometry->location->lat;
            $Lon = $xml->result->geometry->location->lng;
            $latlangString = "$Lat,$Lon";
            return $latlangString;
        } else {
            return $latlangString;
        }
    }

}
