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
    const GENDER_ML = 1;
    const GENDER_FM = 2;
    const GENDER_UN = 0;
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
            [['des','cls'], 'string'],
            [['created_time', 'updated_time'], 'safe'],
            [['name'], 'string', 'max' => 100],
            [['phone','cls'], 'string', 'max' => 25],
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
            'cls'=>'分类',
            'age' => '年龄',
            'des' => '介绍',
            'phone' => '手机号码',
            'created_time' => '创建时间',
            'updated_time' => '最后修改时间',
        ];
    }
    public function behaviors()
    {
        return [
            "timestamp"=> [
                'class' => \yii\behaviors\TimestampBehavior::className(),
                'attributes' => [
                    \yii\db\ActiveRecord::EVENT_BEFORE_INSERT => ['created_time','updated_time'],
                    \yii\db\ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_time'],
                ],
                'value' => function() { return date('Y-m-d H:i:s');}
            ],
        ];
    }

    public static function getGenderMap(){
        return [
            self::GENDER_UN => '保密',
            self::GENDER_ML=>'男',
            self::GENDER_FM=>'女'
        ];
    }

}
