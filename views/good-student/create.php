<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\GoodStudent */

$this->title = '创建优秀学员';
$this->params['breadcrumbs'][] = ['label' => '优秀学生管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="good-student-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
