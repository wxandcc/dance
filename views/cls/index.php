<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Classification;
use app\models\Cls;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ClsQuery */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '课程信息';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cls-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('创建课程', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
           // 'hard',
            [
                'label'=>'课程难易程度',
                'value'=>function($model){
                    return Cls::getHardMap()[$model->hard];
                }
            ],
           // 'age',
            [
                'label'=>'适用年龄段',
                'value'=>function($model){
                    return Cls::getAgeMap()[$model->age];
                }
            ],
            'cls',
            [
                'label'=>'课程分类',
                'value'=>function($model){
                    return Classification::getTeacherClass()[$model->cls];
                }
            ],
            // 'des:ntext',
            // 'showCls:html',
            // 'clsTime:datetime',
            // 'clsAim:ntext',
            // 'clsNotice:ntext',
            // 'created_time',
            // 'updated_time',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
