<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property integer $id
 * @property string $username
 * @property string $password
 * @property integer $superman
 * @property integer $created_time
 * @property integer $updated_time
 * @property integer $status
 * @property string $login_ip
 * @property integer $login_time
 * @property integer $login_count
 * @property integer $update_password
 */
class AdminUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password', 'created_time', 'updated_time', 'login_ip', 'login_time'], 'required'],
            [['superman', 'created_time', 'updated_time', 'status', 'login_time', 'login_count', 'update_password'], 'integer'],
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
            'username' => 'Username',
            'password' => 'Password',
            'superman' => 'Superman',
            'created_time' => 'Created Time',
            'updated_time' => 'Updated Time',
            'status' => 'Status',
            'login_ip' => 'Login Ip',
            'login_time' => 'Login Time',
            'login_count' => 'Login Count',
            'update_password' => 'Update Password',
        ];
    }
}