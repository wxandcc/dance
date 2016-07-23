<?php
    use yii\helpers\Html;
?>

<header>
    <div class="headerwrapper">
        <div class="header-left">
            <a href="index-2.html" class="logo">
                <img src="/images/logo.png" alt="" />
            </a>
            <div class="pull-right">
                <a href="#" class="menu-collapse">
                    <i class="fa fa-bars"></i>
                </a>
            </div>
        </div><!-- header-left -->

        <div class="header-right">

            <div class="pull-right">

                <div class="btn-group btn-group-option">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-caret-down"></i>
                    </button>
                    <ul class="dropdown-menu pull-right" role="menu">
                        <li><a href="<?= Yii::$app->urlManager->createUrl(["user/view",'id'=>$this->params['user']->id])?>"><i class="glyphicon glyphicon-user"></i>我的信息</a></li>
                        <li class="divider"></li>
                        <?= Html::beginForm(['/site/logout'], 'post') ?>
                        <li>
                            <a href="#"><i class="glyphicon glyphicon-log-out"></i>
                                <button type="submit" class="btn-link">退出(<?=$this->params['user']->username;?>)</button>

                            </a>
                        </li>
                        <?= Html::endForm()?></li>
                    </ul>
                </div><!-- btn-group -->

            </div><!-- pull-right -->

        </div><!-- header-right -->

    </div><!-- headerwrapper -->
</header>