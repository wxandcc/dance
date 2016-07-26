<?php

namespace app\models;

use Yii;

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
            [['des'], 'string'],
            [['created_time', 'updated_time'], 'safe'],
            [['name'], 'string', 'max' => 100],
            [['banner'], 'string', 'max' => 255],
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
            'gender' => '性别 1 男 2 女',
            'age' => '年龄',
            'banner' => 'banner图片地址',
            'des' => '介绍',
            'created_time' => '创建时间',
            'updated_time' => '最后修改时间',
        ];
    }
}
