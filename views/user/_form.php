<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\User;

if($model->config){
    $config = json_decode($model->config,true);
}
/* @var $this yii\web\View */
/* @var $model app\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'superman')->dropDownList(User::supermanMap()) ?>
    
    <div class="row">
        <div class="col-sm-12 text-left"><h3>用户拥有的角色</h3></div>
    </div>

    <?php foreach ($this->params['all-role'] as $key=>$role) { ?>
        <div class="panel panel-default padding15">
            <div class="form-group">
                <label class="col-sm-4 control-label">角色</label>
                <div class="col-sm-8">
                    <div class="ckbox ckbox-default">
                        <input name="Role[]" type="checkbox" value="<?=$role['id']?>" id="<?= $key . "-role" ?>" <?= $config && in_array($role['id'],$config) ? 'checked="checked"' : "" ?>>
                        <label for="<?=$key."-role"?>"><?= $role['name'] ?></label>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '新增' : '修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
