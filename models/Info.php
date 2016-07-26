<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%info}}".
 *
 * @property integer $id
 * @property string $title
 * @property string $cls
 * @property string $from
 * @property string $banner
 * @property string $content
 * @property string $created_time
 * @property string $updated_time
 */
class Info extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%info}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'cls', 'banner', 'content'], 'required'],
            [['content'], 'string'],
            [['created_time', 'updated_time'], 'safe'],
            [['title'], 'string', 'max' => 100],
            [['cls'], 'string', 'max' => 20],
            [['from'], 'string', 'max' => 50],
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
            'title' => '资讯标题',
            'cls' => '资讯分类',
            'from' => '来源',
            'banner' => 'banner图片地址',
            'content' => '正文',
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
