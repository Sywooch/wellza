<?php

namespace common\models;

use Yii;
use yii\base\Model;

/**
 * Description of ChangePasswordForm
 *
 * @author hp
 */
class ChangePasswordFormApp extends Model {

    public $current_password;
    public $new_password;
    public $password_hash;
    public function rules() {
        return [
            [['current_password', 'new_password'], 'required'],
            [['new_password'], 'string', 'min' => 6, 'max' => 15],
            [['current_password', 'new_password'], 'safe'],
        ];
    }

    public function changePassword() 
    {
        if ($this->validate()) {
            $user = $this->getUser();
            if ($user === null) {
                $this->addError('error', 'User not found');
            } else {
                    if (Yii::$app->getSecurity()->validatePassword($this->current_password, $user->password_hash)) {
                    $user->setPassword($this->new_password);
                    $user->save(false);
                    return $user;
                } else {
                    $this->addError('password', 'Invalid current password');
                }
            }
            return false;
        } else {
            return false;
        }
    }

    public function getUser() {
        return Yii::$app->user->identity;
    }

}
