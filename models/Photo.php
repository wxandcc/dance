<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%photo}}".
 *
 * @property integer $id
 * @property string $url
 * @property string $cls
 * @property string $banner
 * @property string $des
 * @property string $created_time
 * @property string $updated_time
 */
class Photo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%photo}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['url', 'banner', 'des'], 'required'],
            [['des'], 'string'],
            [['created_time', 'updated_time'], 'safe'],
            [['url', 'banner'], 'string', 'max' => 255],
            [['cls'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'url' => '剧照图片地址',
            'cls' => '资讯分类',
            'banner' => 'banner图片地址',
            'des' => '剧照描述',
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
}
