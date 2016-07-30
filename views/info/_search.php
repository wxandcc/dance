<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Classification;
/* @var $this yii\web\View */
/* @var $model app\models\InfoQuery */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="info-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'cls')->dropDownList(Classification::getInfoClass()) ?>

    <?= $form->field($model, 'from') ?>

    <?php echo $form->field($model, 'content') ?>

    <?=$form->field($model,'_search_date_from')->widget(\yii\jui\DatePicker::classname(), [
        'options' => ['class' => 'form-control'],
        'dateFormat' => 'yyyy-MM-dd',
    ])->label("创建时间开始") ?>

    <?=$form->field($model,'_search_date_end')->widget(\yii\jui\DatePicker::classname(), [
        'options' => ['class' => 'form-control'],
        'dateFormat' => 'yyyy-MM-dd',
    ])->label("创建时间结束") ?>

    <div class="form-group">
        <?= Html::submitButton('查找', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
