<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\GoodStudent;
use app\models\Classification;

/* @var $this yii\web\View */
/* @var $model app\models\GoodStudentQuery */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="good-student-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'gender')->dropDownList(GoodStudent::getGenderMap()) ?>
    <?= $form->field($model, 'cls')->dropDownList(Classification::getStudentClass()) ?>

    <?= $form->field($model, 'age') ?>


    <div class="form-group">
        <?= Html::submitButton('查询', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
