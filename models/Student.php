<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%student}}".
 *
 * @property integer $id
 * @property string $nickname
 * @property string $email
 * @property string $password
 * @property string $phone
 * @property string $avatar
 * @property integer $age
 * @property string $wx_open_id
 * @property string $created_time
 * @property string $updated_time
 */
class Student extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%student}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nickname', 'email', 'password'], 'required'],
            [['age'], 'integer'],
            [['created_time', 'updated_time'], 'safe'],
            [['nickname', 'email', 'password'], 'string', 'max' => 70],
            [['phone'], 'string', 'max' => 20],
            [['avatar', 'wx_open_id'], 'string', 'max' => 255],
            [['nickname'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nickname' => '用户名',
            'email' => '邮箱',
            'password' => '密码',
            'phone' => '手机号',
            'avatar' => '头像',
            'age' => '年龄',
            'wx_open_id' => '微信id',
            'created_time' => '注册时间',
            'updated_time' => '修改时间',
        ];
    }
}
