<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2016/7/23 0023
 * Time: 10:53
 */

namespace app\controllers;


use app\models\User;
use yii\web\Controller;
use Yii;

class BaseController extends Controller
{
    public $layout = "chain";
    protected $auth;
    protected $user;
    public function beforeAction($action)
    {
        if (Yii::$app->user->isGuest) {
            if(Yii::$app->controller->id != 'login') return $this->redirect("/login/index");
        }else{
            $this->user = User::findIdentity(Yii::$app->user->getId());
            $this->getAuth();

            $this->view->params['user'] = $this->user;
            $this->view->params['auth'] = $this->auth;

            if(!$this->checkAccess()){
                return $this->redirect("/login/index");
            }

            return parent::beforeAction($action); // TODO: Change the autogenerated stub
        }
    }

    /**
     * 获取权限数组
     */
    protected function getAuth(){
        if($this->user->isSuperman()){
            $this->auth = Yii::$app->params['auth'];
        }else{
            return [];
        }
    }


    /**
     * 查看权限
     */

    protected function checkAccess(){
        if($this->user->isSuperman()){
            return true;
        }else{
            return false;
        }
    }
}