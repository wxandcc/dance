<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\GoodStudent;
use app\models\Classification;

/* @var $this yii\web\View */
/* @var $model app\models\GoodStudent */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="good-student-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gender')->dropDownList(GoodStudent::getGenderMap()) ?>

    <?= $form->field($model, 'cls')->dropDownList(Classification::getStudentClass()) ?>

    <?= $form->field($model, 'age')->textInput() ?>

    <?= $form->field($model, 'banner')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'des')->widget('kucha\ueditor\UEditor',[])?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '创建' : '修改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
