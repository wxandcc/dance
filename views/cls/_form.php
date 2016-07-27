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

    <?= $form->field($model, 'cls')->dropDownList(Classification::getTeacherClass()) ?>

    <?= $form->field($model, 'des')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'showCls')->widget('kucha\ueditor\UEditor', []) ?>

    <?= $form->field($model, 'clsTime')->textInput() ?>

    <?= $form->field($model, 'clsAim')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'clsNotice')->textarea(['rows' => 6]) ?>

    <?php if (!$model->isNewRecord) { ?>

        <div class="row">
            <div class="col-sm-12 text-center"><h1>教师信息</h1></div>
        </div>
        <?php if ($model->getAllTeachers()) { ?>
            <?php foreach ($model->getAllTeachers() as $cls => $teachers) { ?>
                <div class="panel panel-default padding15">
                    <div>
                        <span
                            class="col-sm-12 text-left border_style1"><?= Classification::getTeacherClass()[$cls] ?></span>
                    </div>
                    <?php if ($teachers) { ?>
                        <div class="form-group padding10">
                            <label class="col-sm-4 control-label">教师信息</label>
                            <div class="col-sm-8">
                                <?php
                                foreach ($teachers as $teacher) {
                                    ?>
                                    <div class="ckbox ckbox-success">
                                        <input name="Teacher[]" type="checkbox"
                                               id="<?= $cls . "-action-" . $teacher->id ?>"
                                               value="1" <?= in_array($teacher->id, $model->getTeachersIds()) ? 'checked="checked"' : "" ?>>
                                        <label
                                            for="<?= $cls . "-action-" . $teacher->id ?>"><?= $teacher->name ?></label>
                                    </div>
                                <?php } ?>
                            </div><!-- col-sm-8 -->
                        </div>
                    <?php } ?>
                </div>
            <?php } ?>
        <?php } ?>

    <?php } ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '创建' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
