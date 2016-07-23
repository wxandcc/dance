<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

if($model->config){
    $config = json_decode($model->config,true);
}
/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('修改', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '确定要删除该用户？',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
            'superman',
            'created_time',
            'updated_time',
            'status',
            'login_ip',
            'login_time:datetime',
            'login_count',
            'update_password',
        ],
    ]) ?>

    <div class="row">
        <div class="col-sm-12 text-left"><h3>用户拥有的角色</h3></div>
    </div>

    <?php foreach ($this->params['all-role'] as $key=>$role) { ?>
        <div class="panel panel-default padding15">
            <div class="form-group">
                <label class="col-sm-4 control-label">角色</label>
                <div class="col-sm-8">
                    <div class="ckbox ckbox-default">
                        <input name="Role[]" type="checkbox" value="<?=$role['id']?>" id="<?= $key . "-role" ?>" <?= $config && in_array($role['id'],$config) ? 'checked="checked"' : "" ?>>
                        <label for="<?=$key."-role"?>"><?= $role['name'] ?></label>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>

</div>
