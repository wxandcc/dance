<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\GoodStudent */

$this->title = 'Create Good Student';
$this->params['breadcrumbs'][] = ['label' => 'Good Students', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="good-student-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
