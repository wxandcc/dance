<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Cls;
use app\models\Classification;

/* @var $this yii\web\View */
/* @var $model app\models\ClsQuery */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cls-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'hard')->dropDownList(Cls::getHardMap()) ?>

    <?= $form->field($model, 'age')->dropDownList(Cls::getAgeMap()) ?>

    <?= $form->field($model, 'cls')->dropDownList(Classification::getTeacherClass()) ?>

    <?php // echo $form->field($model, 'des') ?>

    <?php // echo $form->field($model, 'showCls') ?>

    <?php // echo $form->field($model, 'clsTime') ?>

    <?php // echo $form->field($model, 'clsAim') ?>

    <?php // echo $form->field($model, 'clsNotice') ?>

    <?php // echo $form->field($model, 'created_time') ?>

    <?php // echo $form->field($model, 'updated_time') ?>

    <div class="form-group">
        <?= Html::submitButton('查找', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
