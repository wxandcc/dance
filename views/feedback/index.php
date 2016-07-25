<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Feedback;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FeedbackQuery */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '留言管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feedback-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'stu_id',
            'message:ntext',
            [
                'label'=>'状态',
                'value'=>function($model){
                    return Feedback::getEnableMap()[$model->enable];
                }
            ],
            [
                'label'=>'回复类型',
                'value'=>function($model){
                    return Feedback::getReplyTypeMap()[$model->reply_type];
                }
            ],
            // 'reply:ntext',
            // 'created_time',
            // 'update_time',
            // 'uid',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
