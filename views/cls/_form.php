<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Cls;
use app\models\Classification;
use yii\redactor\RedactorModule;

/* @var $this yii\web\View */
/* @var $model app\models\Cls */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cls-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hard')->dropDownList(Cls::getHardMap()) ?>

    <?= $form->field($model, 'age')->dropDownList(Cls::getAgeMap()) ?>

    <?= $form->field($model, 'cls')->dropDownList(Classification::getTeacherClass())?>

    <?= $form->field($model, 'des')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'showCls')->widget('kucha\ueditor\UEditor',[])?>

    <?= $form->field($model, 'clsTime')->textInput() ?>

    <?= $form->field($model, 'clsAim')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'clsNotice')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '创建' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
