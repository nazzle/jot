<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "posts".
 *
 * @property int $id
 * @property string $attachment
 * @property string $title
 * @property string $descriptions
 * @property string $time
 * @property int $author
 */
class Posts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'posts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['attachment', 'title', 'descriptions', 'time', 'author'], 'required'],
            [['descriptions'], 'string'],
            [['time'], 'safe'],
            [['author','likes','dislikes'], 'integer'],
            [['attachment'], 'string', 'max' => 25],
            [['title'], 'string', 'max' => 60],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'attachment' => Yii::t('app', 'Attachment'),
            'title' => Yii::t('app', 'Title'),
            'descriptions' => Yii::t('app', 'Descriptions'),
            'time' => Yii::t('app', 'Time'),
            'author' => Yii::t('app', 'Author'),
        ];
    }
}
