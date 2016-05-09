<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;


?>
<!DOCTYPE HTML>
<html>
<head>
    <title>后台管理系统</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <?=Html::cssFile('@web/css/bootstrap.css')?>
    <?=Html::jsFile('@web/assets/js/jquery-1.8.1.min.js')?>
    <?=Html::jsFile('@web/Js/captcha/captcha.js')?>
</head>
<body>
<style>
    body{background: #009A61}
    .login{background: #fff;padding: 3em;margin-top: 10em;border-radius: 0.5em;}
    label{display: none;}
    .mr20{margin-right:20px;}
    h3{font-family: "microsoft yahei", "黑体"}
</style>
<div class="container">
    <div class="row">
        <div class="col-md-4 sm col-sm-1"></div>
        <div class="col-md-4 sm col-sm-10 login">
            <h3><p><span class='glyphicon glyphicon-user'></span>&nbsp;欢迎使用用户中心</p></h3>
            <?php $form=ActiveForm::begin([
                'id'=>'login',
                'enableAjaxValidation' => false,
                'options'=>['enctype'=>'multipart/form-data']
            ]);?>

            <?=$form->field($model,'user')->textInput(["placeholder"=>"账号"]); ?>
            <?=$form->field($model,'pwd')->passwordInput(['placeholder'=>'密码']); ?>


            <!--直接通过form生成-->
         <?/*=$form->field($model, 'verifyCode', [
                'options' => ['class' => 'form-group form-group-lg captcha'],
            ])->widget(Captcha::className(),[
                'template' => '<div class="row"><div class="col-md-3 col-xs-4 mr20">{image}</div><div class="col-md-6 col-xs-6">{input}</div></div>',
                'imageOptions' => ['alt' => '验证码'],
                'captchaAction' => '../site/captcha',
            ]);*/?>


            <!--自定义生成-->
           <!-- --><?php
/*            echo Captcha::widget(['name'=>'captchaimg','captchaAction'=>'login/captcha','imageOptions'=>['id'=>'captchaimg', 'title'=>'换一个', 'alt'=>'换一个', 'style'=>'cursor:pointer;margin-left:25px;'],'template'=>'{image}']);//我这里写的跟官方的不一样，因为我这里加了一个参数(login/captcha),这个参数指向你当前控制器名，如果不加这句，就会找到默认的site控制器上去，验证码会一直出不来，在style里是可以写css代码的，可以调试样式 */?>

            <!--点击更换验证码-->
            <!--<div class="loginTr">
                <input type="text" class="form-control xx5" style="width:80px;" name="UserForm[verifyCode]" />
                <img class="captcha" onclick="changeVerifyCode()" id="imgVerifyCode" align="middle" title="点击换一张"  valign="absmiddle">
                <a style="cursor:pointer;" onclick="changeVerifyCode()">换一张</a>
            </div>
            --><?php /*echo ($_POST && isset($model->errors['verifyCode'][0])) ? $model->errors['verifyCode'][0] : '';*/?>

            <div class="form-group form-group-lg captcha field-userform-verifycode required has-error" >
                <label class="control-label" for="userform-verifycode">验证</label>
                <div class="row">
                    <div class="col-md-5 col-xs-5">
                        <input type="text"  class="form-control" name="UserForm[verifyCode]" >
                    </div>
                    <div class="col-md-3 col-xs-4 mr20">
                        <img id="imgVerifyCode" onclick="changeVerifyCode()"  alt="验证码">
                    </div>
                    <div class="col-md-3 col-xs-3">
                        <a style="cursor:pointer;vertical-align: middle;line-height: 46px;" onclick="changeVerifyCode()">换一张</a>
                    </div>
                </div>

                <p class="help-block help-block-error"><?php echo ($_POST && isset($model->errors['verifyCode'][0])) ? $model->errors['verifyCode'][0] : '';?></p>
            </div>

            <?=  Html::submitButton('登录', ['class'=>'btn btn-primary btn-lg btn-block','name' =>'submit-button']) ?>
            <?php ActiveForm::end();?>
        </div>
        <div class="col-md-4 sm col-sm-1"></div>
    </div>
</div>
</body>
</html>

