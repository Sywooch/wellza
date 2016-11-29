<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use common\components\CommonHelper;
use yii\base\view;
use yii\web\UrlManager;

/* @var $this yii\web\View */
$this->title = 'ADMIN LOGIN'
?>
<style>
    /*
   body{
	 background-color: #000000;
   padding: 0px;
   margin: 0px;
 }

#gradient
{
  width: 100%;
  height: 100%;
  padding: 0px;
  margin: 0px;
}*/
body {
margin: 0;
}

html, body, #canvas {
width: 100%;
height: 100%;
}
</style>
<script>
jQuery(document).ready(function($){

var windowXArray = [],
    windowYArray = [];

for (var i = 0; i < $(window).innerWidth(); i++) {
    windowXArray.push(i);
}
    
for (var i = 0; i < $(window).innerHeight(); i++) {
    windowYArray.push(i);
}

function randomPlacement(array) {
    var placement = array[Math.floor(Math.random()*array.length)];
    return placement;
}
    

var canvas = oCanvas.create({
   canvas: '#canvas',
   background: '#2c3e50',
   fps: 60
});

setInterval(function(){

var rectangle = canvas.display.ellipse({
   x: randomPlacement(windowXArray),
   y: randomPlacement(windowYArray),
   origin: { x: 'center', y: 'center' },
   radius: 0,
   fill: '#27ae60',
   opacity: 1
});

canvas.addChild(rectangle);

rectangle.animate({
  radius: 10,
  opacity: 0
}, {
  duration: '1000',
  easing: 'linear',
  callback: function () {
			this.remove();
		}
});

}, 100);

$(window).resize(function(){
canvas.width = $(window).innerWidth();
canvas.height = $(window).innerHeight();
});

$(window).resize();

});
    /*
    var colors = new Array(
  [62,35,255],
  [60,255,60],
  [255,35,98],
  [45,175,230],
  [255,0,255],
  [255,128,0]);

var step = 0;

var colorIndices = [0,1,2,3];

var gradientSpeed = 0.002;

function updateGradient()
{
  
  if ( $===undefined ) return;
  
var c0_0 = colors[colorIndices[0]];
var c0_1 = colors[colorIndices[1]];
var c1_0 = colors[colorIndices[2]];
var c1_1 = colors[colorIndices[3]];

var istep = 1 - step;
var r1 = Math.round(istep * c0_0[0] + step * c0_1[0]);
var g1 = Math.round(istep * c0_0[1] + step * c0_1[1]);
var b1 = Math.round(istep * c0_0[2] + step * c0_1[2]);
var color1 = "rgb("+r1+","+g1+","+b1+")";

var r2 = Math.round(istep * c1_0[0] + step * c1_1[0]);
var g2 = Math.round(istep * c1_0[1] + step * c1_1[1]);
var b2 = Math.round(istep * c1_0[2] + step * c1_1[2]);
var color2 = "rgb("+r2+","+g2+","+b2+")";

 $('#gradient').css({
   background: "-webkit-gradient(linear, left top, right top, from("+color1+"), to("+color2+"))"}).css({
    background: "-moz-linear-gradient(left, "+color1+" 0%, "+color2+" 100%)"});
  
  step += gradientSpeed;
  if ( step >= 1 )
  {
    step %= 1;
    colorIndices[0] = colorIndices[1];
    colorIndices[2] = colorIndices[3];
        
    colorIndices[1] = ( colorIndices[1] + Math.floor( 1 + Math.random() * (colors.length - 1))) % colors.length;
    colorIndices[3] = ( colorIndices[3] + Math.floor( 1 + Math.random() * (colors.length - 1))) % colors.length;
    
  }
}

setInterval(updateGradient,10);*/
</script>

<!--<div id="gradient" />-->

<div class="login-admin">
    <div class="table-cell">
        <div class="container">
            <div class="outer-panel row">
                <div class="inner-panel col-lg-4 col-lg-offset-4">
                    <img src="resource/images/logo.png" class="center-block" style="padding-bottom: 30px;">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title"><?= $this->title ?></h3>
                        </div>
                        <div class="panel-body">
                            <?php
                            $form = ActiveForm::begin(
                                            [
                                                'id' => 'admin_login_form'
                                                //'enableAjaxValidation' => true,
                                                //'enableClientValidation' => true,
                                            ]);
                            ?>
                                <?=
                                $form->field($model, 'email', [
                                    'template' => "<div class='form-group'>{input}\n{hint}\n{error}</div>"
                                ])->textInput(['class' => 'form-control input-lg', 'placeholder' => "E-mail"]);
                                ?>

                                <?=
                                $form->field($model, 'password', [
                                    'template' => "<div class='form-group'>{input}\n{hint}\n{error}</div>"
                                ])->passwordInput(['class' => 'form-control input-lg', 'placeholder' => "Password"]);
                                ?>
                                <!--<div class="form-group">
                                    <input class="form-control input-lg" placeholder="E-mail" name="email" type="email">
                                </div>
                                <div class="form-group">
                                    <input class="form-control input-lg" placeholder="Password" name="password" type="password">
                                </div>-->
                                <!--<button type="button" class="btn btn-info btn-block input-lg">LOGIN</button>-->
                                <?=
                                    Html::submitButton('LOGIN', [
                                        'class' => 'btn btn-info btn-block input-lg'
                                    ]);
                                ?>
                            <?php ActiveForm::end(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<canvas id="canvas"></canvas>
<?php $this->registerJsFile('https://cdnjs.cloudflare.com/ajax/libs/ocanvas/2.8.5/ocanvas.js'); ?>
