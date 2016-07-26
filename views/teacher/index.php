<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TeacherQuery */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '教师管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="teacher-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('新增教师', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            [
                'label'=>'性别',
                'value'=>function($m){
                    return \app\models\Teacher::getGenderMap()[$m->gender];
                }
            ],
            [
                'label'=>'分类',
                'value'=>function($m){
                    return \app\models\Classification::getTeacherClass()[$m->cls];
                }
            ],
            'age',
            'des:ntext',
            'phone',
            'created_time',
            'updated_time',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
