<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Feedback;

/* @var $this yii\web\View */
/* @var $model app\models\FeedbackQuery */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="feedback-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'stu_id') ?>

    <?= $form->field($model, 'message') ?>

    <?= $form->field($model, 'enable')->dropDownList(Feedback::getEnableMap()) ?>

    <?= $form->field($model, 'reply_type')->dropDownList(Feedback::getReplyTypeMap()) ?>

    <?php  echo $form->field($model, 'created_time') ?>

    <div class="form-group">
        <?= Html::submitButton('查询', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
