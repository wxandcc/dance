<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/23 0023
 * Time: 10:56
 */

namespace app\controllers;


use Yii;
use app\models\LoginForm;
use yii\web\Controller;


class LoginController extends Controller
{
    public $layout = "login";
    public function actionIndex(){
        if (!Yii::$app->user->isGuest ) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goHome();
        }
        
        return $this->render('index', [
            'model' => $model,
        ]);
    }
}