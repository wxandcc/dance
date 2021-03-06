<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
/**
 * This is the model class for table "{{%resource}}".
 *
 * @property integer $id
 * @property string $name
 * @property integer $enable
 * @property integer $type
 * @property string $created_time
 * @property integer $uid
 * @property string $location
 */
class Resource extends \yii\db\ActiveRecord
{
    public $uploadFile;
    const  ENABLE = 1;
    const  DISABLE = 0;

    const TYPE_IMG = 1;
    const TYPE_VIDEO = 2;

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%resource}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['enable', 'type', 'uid'], 'integer'],
            [['created_time'], 'safe'],
            [['name'], 'string', 'max' => 70],
            [['name'], 'unique'],
            [['location'], 'string'],
            [['uploadFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg,jpeg,gif,mp4']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '资源名称',
            'enable' => '资源状态',
            'type' => '资源类型',
            'created_time' => '创建时间',
            'uid' => '创建者ID',
            'location' => '文件位置',
        ];
    }

    public static function enableMap(){
        return [
            self::ENABLE=>'有效资源',
            self::DISABLE => '废弃资源'
        ];
    }

    public static function ResourceTypeMap(){
        return [
            self::TYPE_IMG=>'图片',
            self::TYPE_VIDEO => '视频'
        ];
    }

    public function beforeSave($insert)
    {
        if($insert){
            $user = Yii::$app->user->getIdentity();
            $this->uid = $user->id;
        }
        return parent::beforeSave($insert); // TODO: Change the autogenerated stub
    }


    public function behaviors()
    {
        return [
            "timestamp"=> [
                'class' => TimestampBehavior::className(),
                'attributes' => [
                    \yii\db\ActiveRecord::EVENT_BEFORE_INSERT => ['created_time']
                ],
                'value' => function() { return date('Y-m-d H:i:s');}
            ],
        ];
    }
}
