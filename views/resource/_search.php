<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Resource;

/* @var $this yii\web\View */
/* @var $model app\models\ResourceQuery */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="resource-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'enable')->dropDownList(Resource::enableMap()) ?>

    <?= $form->field($model, 'type')->dropDownList(Resource::ResourceTypeMap()) ?>

    <div class="form-group">
        <?= Html::submitButton('查询', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
