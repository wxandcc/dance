<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TeacherQuery */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="teacher-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'gender')->dropDownList(\app\models\Teacher::getGenderMap()) ?>

    <?= $form->field($model, 'cls')->dropDownList(\app\models\Classification::getTeacherClass()) ?>

    <?= $form->field($model, 'age') ?>

    <?= $form->field($model, 'des') ?>

    <?php echo $form->field($model, 'phone') ?>


    <div class="form-group">
        <?= Html::submitButton('查找', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
