<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "who_is_who".
 *
 * @property int $id
 * @property string $photo
 * @property string $name
 * @property string $position
 * @property int $posted_by
 */
class WhoIsWho extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $attachment;

    public static function tableName()
    {
        return 'who_is_who';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['photo', 'name', 'position', 'posted_by','upload_time'], 'required'],
            [['posted_by'], 'integer'],
            [['attachment'], 'file'],
            [['photo'], 'string', 'max' => 225],
            [['name'], 'string', 'max' => 60],
            [['position'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'photo' => Yii::t('app', 'Photo'),
            'name' => Yii::t('app', 'Name'),
            'position' => Yii::t('app', 'Position'),
            'posted_by' => Yii::t('app', 'Posted By'),
            'attachment' => Yii::t('app', 'Photo'),
        ];
    }
}
