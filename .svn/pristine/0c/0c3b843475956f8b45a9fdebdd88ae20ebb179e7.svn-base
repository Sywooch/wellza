<?php
/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>

    </head>

    <body>
        <?php $this->beginBody() ?>   
        <?php
            echo $this->render('//layouts/inner-header');
            echo $this->render('//layouts/right-menu');
        ?>
        <?= $content ?>   
        <?php
            echo $this->render('//layouts/inner-footer');
        ?>
        <?php $this->endBody() ?>
    </body>    
    <?php $this->endPage() ?>
</html>
<?php $this->endPage() ?>
