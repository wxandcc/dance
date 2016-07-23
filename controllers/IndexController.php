<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/23 0023
 * Time: 0:14
 */

namespace app\controllers;
use yii\web\Controller;


class IndexController extends BaseController
{
    public function actionLogin(){
        $this->layout = "login";
        return $this->render("login");
    }
}