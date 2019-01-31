<?php

namespace app\modules\land\models;

use Yii;

/**
 * This is the model class for table "land_posts".
 *
 * @property int $id
 * @property string $attachment
 * @property string $title
 * @property string $descriptions
 * @property int $likes
 * @property int $dislikes
 * @property string $time
 * @property int $location_id
 * @property string $status
 * @property int $author
 */
class LandPosts extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $photo;

    public static function tableName()
    {
        return 'land_posts';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['attachment', 'title', 'descriptions', 'time', 'location_id', 'status', 'author'], 'required'],
            [['descriptions', 'status'], 'string'],
            [['likes', 'dislikes', 'location_id', 'author'], 'integer'],
            [['time'], 'safe'],
            [['photo'], 'file'],
            [['attachment'], 'string', 'max' => 250],
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
            'likes' => Yii::t('app', 'Likes'),
            'dislikes' => Yii::t('app', 'Dislikes'),
            'time' => Yii::t('app', 'Time'),
            'location_id' => Yii::t('app', 'Location ID'),
            'status' => Yii::t('app', 'Status'),
            'author' => Yii::t('app', 'Author'),
            'photo' => Yii::t('app', 'Photo'),
        ];
    }
}
