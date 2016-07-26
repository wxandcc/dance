<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%relationship}}".
 *
 * @property integer $id
 * @property string $class_id
 * @property string $teacher_id
 * @property integer $enable
 */
class Relationship extends \yii\db\ActiveRecord
{
    const ENABLE = 1;
    const DISABLE = 0;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%relationship}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['class_id', 'teacher_id'], 'required'],
            [['enable'], 'integer'],
            [['class_id', 'teacher_id'], 'string', 'max' => 70],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'class_id' => '课程id',
            'teacher_id' => '教师ID',
            'enable' => '状态',
        ];
    }
}
