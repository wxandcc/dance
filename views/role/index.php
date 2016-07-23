<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Role;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RoleQuery */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '角色管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="role-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('创建角色', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            [
                'label'=>'角色状态',
                'value'=>function($model){
                    return Role::enableMap()[$model->enable];
                }
            ],
            'enable',
            'created_time',
            'updated_time',
            // 'config:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
