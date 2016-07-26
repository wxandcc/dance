<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\GoodStudent */

$this->title = '修改优秀学员信息: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Good Students', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '修改';
?>
<div class="good-student-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
