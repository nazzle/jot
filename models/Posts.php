<?php

namespace app\models;

use Yii;
use app\models\User;

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
    public $photo;

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
            [['photo'], 'file'],
            [['author','likes','dislikes'], 'integer'],
            [['attachment'], 'string', 'max' => 225],
            [['title'], 'string', 'max' => 100],
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
            'photo' => Yii::t('app', 'Photo'),
        ];
    }


     /**
     * @return \yii\db\ActiveQuery
     */
    public function getName()
    {
       return $this->hasOne(User::className(), ['id' => 'author']);
    }
}
