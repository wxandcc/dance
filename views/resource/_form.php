<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Resource;

/* @var $this yii\web\View */
/* @var $model app\models\Resource */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="resource-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'enable')->dropDownList(Resource::enableMap()) ?>

    <?php if ($model->isNewRecord) {
        echo $form->field($model, 'type')->dropDownList(Resource::ResourceTypeMap());
    } ?>

    <?= $form->field($model, 'uploadFile')->fileInput() ?>

    <?php if (!$model->isNewRecord) {
        if ($model->type == Resource::TYPE_IMG) { ?>
            <div class="panel panel-default padding15">
                <div class="row">
                    <a target="_blank" href="/<?=$model->location?>"><img width="100%" src="/<?=$model->location?>"></a>
                </div>
            </div>
        <?php } else { ?>
            <div class="row padding15"><h3>视频资源详情</h3></div>
            <div class="panel panel-default padding15">
                <video width="100%" height="auto" controls="controls">
                    <source src="/<?= $model->location ?>" type="video/ogg">
                    <source src="/<?= $model->location ?>" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        <?php } ?>
    <?php } ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '新增' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
