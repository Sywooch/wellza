<?php

namespace common\filters\auth;

use Yii;
use common\models\Authtoken;

/**
 * Description of QueryParamAuth
 *
 */
class QueryParamAuth extends \yii\filters\auth\QueryParamAuth {

    public function authenticate($user, $request, $response) {
        $accessToken = '';

        if (empty($accessToken)) {
            if (Yii::$app->request->getHeaders()->get('access-token')) {
                $accessToken = Yii::$app->request->getHeaders()->get('access-token');
            }
        }

        if (empty($accessToken)) {
            if (Yii::$app->request->getBodyParam('access-token')) {
                $accessToken = Yii::$app->request->getBodyParam('access-token');
            }
        }

        if (is_string($accessToken) && !empty($accessToken)) {

            if (is_string($accessToken)) {
                $identity = $user->loginByAccessToken($accessToken, get_class($this));
                if (null !== $identity) {
                    return $identity;
                }
            }
        }
        if ($accessToken !== null) {
            $this->handleFailure($response);
        }
        return null;
    }

}
