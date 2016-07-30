<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Resource;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ResourceQuery */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '资源管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="resource-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('创建资源', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            [
                'label'=>'是否有效',
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
            'created_time',
            // 'uid',
            'location:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
