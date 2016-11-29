<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use backend\assets\AdminAsset;
use common\widgets\Alert;
use yii\web\View;

AdminAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

        <?php
            $controller_id =  \Yii::$app->controller->id;
                        
            if($controller_id != 'login') {
                echo $this->render('//layouts/header');
                echo $this->render('//layouts/left-menu');
            }            
        ?>
    <?=$content ?>
<?php
    if($controller_id != 'login') {
        echo $this->render('//layouts/footer');
    }    
?>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
