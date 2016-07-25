<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "{{%class}}".
 *
 * @property integer $id
 * @property string $name
 * @property integer $hard
 * @property integer $age
 * @property string $cls
 * @property string $des
 * @property string $showCls
 * @property integer $clsTime
 * @property string $clsAim
 * @property string $clsNotice
 * @property string $created_time
 * @property string $updated_time
 */
class Cls extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%class}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'hard', 'age', 'cls', 'des', 'showCls', 'clsTime', 'clsAim', 'clsNotice'], 'required'],
            [['hard', 'age', 'clsTime'], 'integer'],
            [['des', 'showCls', 'clsAim', 'clsNotice'], 'string'],
            [['created_time', 'updated_time'], 'safe'],
            [['name'], 'string', 'max' => 100],
            [['cls'], 'string', 'max' => 25],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '课程名称',
            'hard' => '课程难度',
            'age' => '适用年龄段',
            'cls' => '分类',
            'des' => '课程介绍',
            'showCls' => '教学环境展示',
            'clsTime' => '课时',
            'clsAim' => '预期效果',
            'clsNotice' => '课程须知',
            'created_time' => '创建时间',
            'updated_time' => '最后修改时间',
        ];
    }


    public static function getAgeMap(){
        return [
            '1'=>'3-5岁',
            '2'=>'4-6岁',
            '3'=>'6-8岁',
        ];
    }

    public static function getHardMap(){
        return [
            '1'=>'1星',
            '2'=>'2星',
            '3'=>'3星',
        ];
    }

    public function behaviors()
    {
        return [
            "timestamp"=> [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    \yii\db\ActiveRecord::EVENT_BEFORE_INSERT => ['created_time','updated_time'],
                    \yii\db\ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_time'],
                ],
                'value' => function() { return date('Y-m-d H:i:s');}
            ],
        ];
    }
}
