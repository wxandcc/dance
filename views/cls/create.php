<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Cls */

$this->title = '创建课程';
$this->params['breadcrumbs'][] = ['label' => 'Cls', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cls-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
