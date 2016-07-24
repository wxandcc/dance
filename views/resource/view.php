<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Resource;

/* @var $this yii\web\View */
/* @var $model app\models\Resource */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Resources', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="resource-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('更新', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '确定要删除这条资源?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            [
                'label' => '状态',
                'value' => Resource::enableMap()[$model->enable]
            ],
            [
                'label' => '类型',
                'value' => Resource::ResourceTypeMap()[$model->type]
            ],
            'created_time',
            'location:ntext'
        ],
    ]) ?>

    <?php if ($model->location) {
        if ($model->type == Resource::TYPE_IMG) { ?>
            <div class="row padding15"><h3>图片资源详情</h3></div>
            <div class="panel panel-default padding15">
                <div class="row">
                    <a target="_blank" href="/<?= $model->location ?>"><img width="100%" src="/<?= $model->location ?>"></a>
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

</div>
