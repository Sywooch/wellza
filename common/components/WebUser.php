<?php

namespace common\components;

use Yii;

class WebUser extends \yii\web\User {

    public function getIsSuperAdmin() {
        return (!empty(\Yii::$app->user->identity) && \Yii::$app->user->identity->user_type == 'Super Administrator') ? true : false;
    }
    
    public function getIsAdmin() {
        return (!empty(\Yii::$app->user->identity) && \Yii::$app->user->identity->user_type == 'Administrator') ? true : false;
    }

    public function getIsClient() {
        return (!empty(\Yii::$app->user->identity) && \Yii::$app->user->identity->user_type == 'Client') ? true : false;
    }
    public function getIsProvider() {
        return (!empty(\Yii::$app->user->identity) && \Yii::$app->user->identity->user_type == 'Provider') ? true : false;
    }
    
    public function getId() {
        if (!empty(\Yii::$app->user->identity->Id))
            return \Yii::$app->user->identity->Id;
        else
            return false;
    }
    public function getFullName() {
        if (!empty(\Yii::$app->user->identity->first_name) &&!empty(\Yii::$app->user->identity->last_name))
            return \Yii::$app->user->identity->first_name.' '.\Yii::$app->user->identity->last_name;
        else
            return false;
    }

    public function getIsLoggedIn() {
        if (!empty(\Yii::$app->user->identity->Id))
            return true;
        else
            return false;
    }

}
