<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "wz_good_student".
 *
 * @property integer $id
 * @property string $name
 * @property integer $gender
 * @property integer $age
 * @property string $banner
 * @property string $des
 * @property string $created_time
 * @property string $updated_time
 */
class GoodStudent extends \yii\db\ActiveRecord
{

    const GENDER_ML = 1;
    const GENDER_FM = 2;
    const GENDER_UN = 0;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'wz_good_student';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'age', 'banner', 'des'], 'required'],
            [['gender', 'age'], 'integer'],
            [['des','cls'], 'string'],
            [['created_time', 'updated_time'], 'safe'],
            [['name'], 'string', 'max' => 100],
            [['banner'], 'string', 'max' => 255],
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
            'name' => '学员名称',
            'gender' => '性别',
            'cls'=>'分类',
            'age' => '年龄',
            'banner' => 'banner图片地址',
            'des' => '介绍',
            'created_time' => '创建时间',
            'updated_time' => '最后修改时间',
        ];
    }

    public static function getGenderMap(){
        return [
            self::GENDER_UN => '保密',
            self::GENDER_ML=>'男',
            self::GENDER_FM=>'女'
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
