<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Role;

if ($model->config) {
    $config = json_decode($model->config, true);
}

/* @var $this yii\web\View */
/* @var $model app\models\Role */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="role-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'enable')->dropDownList(Role::enableMap()) ?>

    <? //= $form->field($model, 'config')->textarea(['rows' => 6]) ?>

    <?php foreach ($this->params['all-auth'] as $key => $auth) { ?>
        <div class="panel panel-default padding15">
            <div class="form-group">
                <label class="col-sm-4 control-label"><?= $auth['info'] ?></label>
                <div class="col-sm-8">
                    <div class="ckbox ckbox-default">
                        <input name="Auth[<?= $key ?>][all]" type="checkbox" value="1"
                               id="<?= $key . "-all" ?>" <?= $config && $config[$key]['all'] == 1 ? 'checked="checked"' : "" ?>>
                        <label for="<?= $key . "-all" ?>">全部授权</label>
                    </div>
                </div>
            </div>
            <?php if ($auth['action']) { ?>
                <div class="form-group">
                    <label class="col-sm-4 control-label">详细权限</label>
                    <div class="col-sm-8">
                        <?php
                        foreach ($auth['action'] as $action => $name) {
                            ?>
                            <div class="ckbox ckbox-success">
                                <input name="Auth[<?= $key ?>][action][<?= $action ?>]" type="checkbox"
                                       id="<?= $key . "-action-" . $action ?>"
                                       value="1" <?= $config && $config[$key]['action'][$action] == 1 ? 'checked="checked"' : "" ?>>
                                <label for="<?= $key . "-action-" . $action ?>"><?= $name ?></label>
                            </div>
                        <?php } ?>
                    </div><!-- col-sm-8 -->
                </div>
            <?php } ?>
        </div>
    <?php } ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '创建' : '修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
