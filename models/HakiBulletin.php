<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "haki_bulletin".
 *
 * @property int $id
 * @property string $poster
 * @property string $attachment
 * @property string $caption
 */
class HakiBulletin extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */

    public $photo;
    public $document;

    public static function tableName()
    {
        return 'haki_bulletin';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['poster', 'attachment', 'caption', 'photo', 'document', 'published_by', 'time'], 'required'],
            [['photo','document'], 'file'],
            [['poster', 'attachment', 'caption'], 'string', 'max' => 115],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'poster' => Yii::t('app', 'Poster'),
            'attachment' => Yii::t('app', 'Attachment'),
            'caption' => Yii::t('app', 'Caption'),
            'photo' => Yii::t('app', 'Poster'),
            'document' => Yii::t('app', 'Document'),
            'published_by' => Yii::t('app', 'Published By'),
            'time' => Yii::t('app', 'Time'),
        ];
    }
}
