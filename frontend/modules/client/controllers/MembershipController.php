<?php
/* * ********************************************************************************************************************* *//**
 *  Controller Name: MembershipController.php
 *  Created: Codian Team
 *  Description: This will manage the membership for the client.Manages the ajax calls functions.
 * ************************************************************************************************************************* */

namespace frontend\modules\client\controllers;

class MembershipController extends \frontend\modules\client\components\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
/*************************************************************************************************************************************/
// EOF: MembershipController.php
/*************************************************************************************************************************************/