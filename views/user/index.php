<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\User;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserQuery */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '管理员信息';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('新增管理员', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            //'password',
            [
                'label'=>'管理员级别',
                'value' => function ($data) {
                        return User::supermanMap()[$data->superman];
                },
            ],
            'created_time',
            // 'updated_time',
            [
                'label'=>'状态',
                'value' => function ($data) {
                    return User::statusMap()[$data->status];
                },
            ],
            // 'status',
            'login_ip',
            // 'login_time:datetime',
            // 'login_count',
            // 'update_password',
            // 'config:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
