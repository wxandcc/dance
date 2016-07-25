<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Cls */

$this->title = '修改课程: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Cls', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '修改';
?>
<div class="cls-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
