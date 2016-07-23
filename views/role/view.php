<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

if ($model->config) {
    $config = json_decode($model->config, true);
}

/* @var $this yii\web\View */
/* @var $model app\models\Role */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Roles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="role-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('修改', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '确定删除该角色?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'enable',
            'created_time',
            'updated_time',
        ],
    ]) ?>
    <div class="row">
        <div class="col-sm-12 text-center"><h1>权限详情</h1></div>
    </div>
    <?php foreach ($this->params['all-auth'] as $key => $auth) { ?>
        <div class="panel panel-default padding15">
            <div class="form-group">
                <label class="col-sm-4 control-label"><?= $auth['info'] ?></label>
                <div class="col-sm-8">
                    <div class="ckbox ckbox-default">
                        <input name="Auth[<?= $key ?>][all]" type="checkbox" value="1"
                               id="<?= $key . "-all" ?>" <?= $config && $config[$key]['all'] == 1 ? 'checked="checked"' : "" ?>>
                        <label for="<?= $key . "-all" ?>">全部授权</label>
                    </div>
                </div>
            </div>
            <?php if ($auth['action']) { ?>
                <div class="form-group">
                    <label class="col-sm-4 control-label">详细权限</label>
                    <div class="col-sm-8">
                        <?php
                        foreach ($auth['action'] as $action => $name) {
                            ?>
                            <div class="ckbox ckbox-success">
                                <input name="Auth[<?= $key ?>][action][<?= $action ?>]" type="checkbox"
                                       id="<?= $key . "-action-" . $action ?>"
                                       value="1" <?= $config && $config[$key]['action'][$action] == 1 ? 'checked="checked"' : "" ?>>
                                <label for="<?= $key . "-action-" . $action ?>"><?= $name ?></label>
                            </div>
                        <?php } ?>
                    </div><!-- col-sm-8 -->
                </div>
            <?php } ?>
        </div>
    <?php } ?>

</div>
