<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Classification;
use app\models\Cls;

/* @var $this yii\web\View */
/* @var $model app\models\Cls */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Cls', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cls-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('更新', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            //'hard',
            [
                'label' => '课程难易程度',
                'value' => Cls::getHardMap()[$model->hard]
            ],
            // 'age',
            [
                'label' => '适用年龄段',
                'value' => Cls::getAgeMap()[$model->age]
            ],
            // 'cls',
            [
                'label' => '分类',
                'value' => Classification::getTeacherClass()[$model->cls]
            ],
            'des:ntext',
            'showCls:ntext',
            'clsTime:datetime',
            'clsAim:ntext',
            'clsNotice:ntext',
            'created_time',
            'updated_time',
        ],
    ]) ?>

    <div class="row">
        <div class="col-sm-12 text-center"><h1>教师信息</h1></div>
    </div>
    <?php if ($model->getAllTeachers()) { ?>
        <?php foreach ($model->getAllTeachers() as $cls => $teachers) { ?>
            <div class="panel panel-default padding15">
                <div>
                    <span class="col-sm-12 text-left border_style1"><?= Classification::getTeacherClass()[$cls] ?></span>
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
                                           value="1" <?= in_array($teacher->id,$model->getTeachersIds()) ? 'checked="checked"' : "" ?>>
                                    <label for="<?= $cls . "-action-" . $teacher->id ?>"><?= $teacher->name ?></label>
                                </div>
                            <?php } ?>
                        </div><!-- col-sm-8 -->
                    </div>
                <?php } ?>
            </div>
        <?php } ?>
    <?php } ?>
</div>
