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
            [['enable'], 'in','range'=>[0,1],"message"=>"有效值只能是1或者0"],
            [['created_time', 'updated_time'], 'safe'],
            [['config'], 'string'],
            [['name'], 'string', 'max' => 70],
        ];
    }

    public function behaviors()
    {
        return [
            "timestamp"=> [
                'class' => yii\behaviors\TimestampBehavior::className(),
                'attributes' => [
                    \yii\db\ActiveRecord::EVENT_BEFORE_INSERT => ['created_time', 'updated_time'],
                    \yii\db\ActiveRecord::EVENT_BEFORE_UPDATE => ['updated_time'],
                ],
                'value' => function() { return date('Y-m-d H:i:s');}
            ],
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
            'created_time' => '创建时间',
            'updated_time' => '修改时间',
            'config' => '角色配置',
        ];
    }
}
