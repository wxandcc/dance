<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Feedback;

/* @var $this yii\web\View */
/* @var $model app\models\Feedback */

$this->title = "留言详情";
$this->params['breadcrumbs'][] = ['label' => '留言管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feedback-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('回复', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
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
            'stu_id',
            'message:ntext',
            //'enable',
            [
                'label'=>'状态',
                'value'=> Feedback::getEnableMap()[$model->enable]
            ],
           // 'reply_type',
            [
                'label'=>'回复类型',
                'value'=> Feedback::getReplyTypeMap()[$model->reply_type]
            ],
            'reply:ntext',
            'created_time',
            'update_time',
            //'uid',
        ],
    ]) ?>

</div>
