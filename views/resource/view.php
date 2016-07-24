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
                'label'=>'状态',
                'value'=>function($model){
                    return Resource::enableMap()[$model->enable];
                }
            ],
            [
                'label'=>'类型',
                'value'=>function($model){
                    return Resource::ResourceTypeMap()[$model->type];
                }
            ],
            'created_time'
        ],
    ]) ?>

</div>
