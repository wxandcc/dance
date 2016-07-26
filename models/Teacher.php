<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%teacher}}".
 *
 * @property integer $id
 * @property string $name
 * @property integer $gender
 * @property integer $age
 * @property string $des
 * @property string $phone
 * @property string $created_time
 * @property string $updated_time
 */
class Teacher extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%teacher}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'age', 'des', 'phone'], 'required'],
            [['gender', 'age'], 'integer'],
            [['des'], 'string'],
            [['created_time', 'updated_time'], 'safe'],
            [['name'], 'string', 'max' => 100],
            [['phone'], 'string', 'max' => 25],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '教师名称',
            'gender' => '性别 1 男 2 女',
            'age' => '年龄',
            'des' => '介绍',
            'phone' => '手机号码',
            'created_time' => '创建时间',
            'updated_time' => '最后修改时间',
        ];
    }
}
