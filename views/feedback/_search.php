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

    
    <?=$form->field($model,'_search_date_from')->widget(\yii\jui\DatePicker::classname(), [
        'options' => ['class' => 'form-control'],
        'dateFormat' => 'yyyy-MM-dd',
    ])->label("创建时间开始") ?>

    <?=$form->field($model,'_search_date_end')->widget(\yii\jui\DatePicker::classname(), [
        'options' => ['class' => 'form-control'],
        'dateFormat' => 'yyyy-MM-dd',
    ])->label("创建时间结束") ?>

    <div class="form-group">
        <?= Html::submitButton('查询', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
