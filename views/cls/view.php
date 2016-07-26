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
                'label'=>'课程难易程度',
                'value'=>Cls::getHardMap()[$model->hard]
            ],
           // 'age',
            [
                'label'=>'适用年龄段',
                'value'=>Cls::getAgeMap()[$model->age]
            ],
           // 'cls',
            [
                'label'=>'分类',
                'value'=>Classification::getTeacherClass()[$model->cls]
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

</div>
