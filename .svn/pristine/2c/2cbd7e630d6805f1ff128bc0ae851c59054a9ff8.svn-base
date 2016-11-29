<?php

namespace common\models;

/**
 * Description of SignupFactory
 *
 * @author hp
 */
class SignupFactory {

    const TYPE_SOCIAL = 'social';
    const TYPE_SOCIAL_LOGIN = 'sociallogin';
    //const TYPE_NORMAL = 'normal';

    public static function create($signup_type = null) {
        
        if ($signup_type === static::TYPE_SOCIAL) {
            return new SocialSignup();
        }elseif ($signup_type === static::TYPE_SOCIAL_LOGIN) {
            return new SocialLogin();
        } else {
            
            return new NormalSignup();
        }
    }

}
