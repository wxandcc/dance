<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\GoodStudent;
use app\models\Classification;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GoodStudentQuery */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '优秀学员管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="good-student-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('创建优秀学员', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            //'gender',
            [
                'label'=>'性别',
                'value'=>function($m){
                    return GoodStudent::getGenderMap()[$m->gender];
                }
            ],
            [
                'label'=>'分类',
                'value'=>function($m){
                    return Classification::getStudentClass()[$m->cls];
                }
            ],
            'age',
            'banner',
            'des:ntext',
            'created_time',
            'updated_time',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
