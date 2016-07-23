<?php
use yii\bootstrap\ActiveForm;
?>

<section>

    <div class="panel panel-signin">
        <div class="panel-body">
            <div class="logo text-center">
                <img src="/images/logo-primary.png" alt="Chain Logo" >
            </div>
            <br />
            <p class="text-center">登录</p>

            <div class="mb30"></div>
            <?php $form = ActiveForm::begin([])?>
                <div class="input-group mb15">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input name="LoginForm[username]" type="text" class="form-control" placeholder="用户�?" autofocus>
                </div><!-- input-group -->
                <div class="input-group mb15">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input  name="LoginForm[password]" type="password" class="form-control" placeholder="密码">
                </div><!-- input-group -->

                <div class="clearfix">
                    <div class="pull-left">
                        <div class="ckbox ckbox-primary mt10">
                            <input name="LoginForm[rememberMe]" type="checkbox" id="rememberMe" value="1">
                            <label for="rememberMe">记住我</label>
                        </div>
                    </div>
                    <div class="pull-right">
                        <button type="submit" class="btn btn-success">登录<i class="fa fa-angle-right ml5"></i></button>
                    </div>
                </div>
            <?php ActiveForm::end(); ?>

        </div><!-- panel-body -->
    </div><!-- panel -->
</section>