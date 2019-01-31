<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "announcements".
 *
 * @property int $id
 * @property string $type
 * @property string $attachment
 * @property string $title
 */
class Announcements extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */

    public $file;

    public static function tableName()
    {
        return 'announcements';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type', 'attachment', 'title', 'published_by', 'location', 'time',], 'required'],
            [['published_by', 'location'], 'integer'],
            [['time'], 'safe'],
            [['type'], 'string'],
            [['file'], 'file'],
            [['attachment'], 'string', 'max' => 250],
            [['title'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'type' => Yii::t('app', 'Type'),
            'attachment' => Yii::t('app', 'Attachment'),
            'title' => Yii::t('app', 'Title'),
            'file' => Yii::t('app', 'Attachment/Poster'),
        ];
    }
}
