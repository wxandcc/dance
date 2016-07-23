<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%role}}".
 *
 * @property integer $id
 * @property string $name
 * @property integer $enable
 * @property string $created_time
 * @property string $updated_time
 * @property string $config
 */
class Role extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%role}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['enable'], 'integer'],
            [['created_time', 'updated_time'], 'safe'],
            [['config'], 'string'],
            [['name'], 'string', 'max' => 70],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '角色名称',
            'enable' => '1有效 0无效',
            'created_time' => '注册时间',
            'updated_time' => '修改时间',
            'config' => 'Config',
        ];
    }
}
