<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\GoodStudent;
use app\models\Classification;

/* @var $this yii\web\View */
/* @var $model app\models\GoodStudent */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Good Students', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="good-student-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('修改', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
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
            [
                'label'=>'性别',
                'value'=> GoodStudent::getGenderMap()[$model->gender]
            ],

            [
                'label'=>'分类',
                'value'=> Classification::getStudentClass()[$model->cls]
            ],
            'age',
            'banner',
            'des:ntext',
            'created_time',
            'updated_time',
        ],
    ]) ?>

</div>
