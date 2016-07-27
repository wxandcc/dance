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

    public static function updateTeachers($class_id,$teachers_id){
        self::deleteAll(['class_id'=>$class_id]);
        if($teachers_id){
            $bulkInsertArray = array();
            foreach($teachers_id as $id){
                $bulkInsertArray[]=[
                    'class_id'=>$class_id,
                    'teacher_id'=>$id,
                    'enable'=> self::ENABLE
                ];
            }
            if(count($bulkInsertArray)>0){
                $columnNameArray=['class_id','teacher_id','enable'];
                // below line insert all your record and return number of rows inserted
                Yii::$app->db->createCommand()
                    ->batchInsert(
                        self::tableName(), $columnNameArray, $bulkInsertArray
                    )
                    ->execute();
            }

        }
    }
}
