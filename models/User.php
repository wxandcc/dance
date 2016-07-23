<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    const SUPERMAN = 1;
    const NORMALMAN=0;

    const STATUS_NORMAL = 1;
    const STATUS_CLOSE = 0;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    public static function supermanMap(){
        return [
            self::SUPERMAN=>'超级管理员',
            self::NORMALMAN=>'普通管理员'
        ];
    }

    public static function statusMap(){
        return [
            self::STATUS_NORMAL=>'正常',
            self::STATUS_CLOSE=>'禁止'
        ];
    }


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            [['created_time','updated_time','config'], 'safe'],
            [['superman','status'],'in','range'=>[0,1]],
            [['superman','status', 'login_time', 'login_count', 'update_password'], 'integer'],
            [['username', 'password'], 'string', 'max' => 70],
            [['login_ip'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => '用户名',
            'password' => '密码',
            'superman' => '超管',
            'created_time' => '创建时间',
            'updated_time' => '修改时间',
            'status' => '状态',
            'login_ip' => '上次登录IP地址',
            'login_time' => '上次登录时间',
            'login_count' => '登陆次数',
            'update_password' => '修改密码次数',
            'config'=>'权限配置信息'
        ];
    }


    public function behaviors()
    {
        return [
            "timestamp"=> [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    \yii\db\ActiveRecord::EVENT_BEFORE_INSERT => ['created_time', 'updated_time'],
                    \yii\db\ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_time'],
                ],
                'value' => function() { return date('Y-m-d H:i:s');}
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id'=>$id]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        $user = static::findOne(['username'=>$username]);
        if($user){
            return $user;
        }
        return null;
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return $this->password === $password;
    }

    public function isSuperman(){
        return $this->superman == self::SUPERMAN;
    }

}
