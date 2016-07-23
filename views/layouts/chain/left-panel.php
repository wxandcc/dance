<div class="leftpanel">
    <div class="media profile-left">
        <a class="pull-left profile-thumb"
           href="<?= Yii::$app->urlManager->createUrl(["user/view", 'id' => $this->params['user']->id]) ?>">
            <img class="img-circle" src="/images/photos/profile.png" alt="">
        </a>
        <div class="media-body">
            <h4 class="media-heading"><?= $this->params['user']->username; ?></h4>
            <!--            <small class="text-muted">Beach Lover</small> -->
        </div>
    </div><!-- media -->

    <h5 class="leftpanel-title">导航栏</h5>
    <ul class="nav nav-pills nav-stacked">
        <?php if ($this->params['auth']) {
            foreach ($this->params['auth'] as $controller => $auth) {
                ?>
                <?php if ($auth['all'] || !empty($auth['action'])) { ?>
                    <li><a href="<?= Yii::$app->urlManager->createUrl($auth['defaultUrl']) ?>"><i
                                class="fa fa-bars"></i> <span><?= $auth['info'] ?></span></a></li>
                <?php } ?>
                <?php
            }
        } ?>
    </ul>

</div><!-- leftpanel -->

    