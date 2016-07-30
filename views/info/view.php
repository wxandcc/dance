<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Classification;

/* @var $this yii\web\View */
/* @var $model app\models\Info */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => '资讯管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="info-view">

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
            'title',
            [
                'label'=>'分类',
                'value'=>Classification::getInfoClass()[$model->cls]
            ],
            'from',
            'banner',
            'content:ntext',
            'created_time',
            'updated_time',
        ],
    ]) ?>

</div>
