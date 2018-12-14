<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "useful_attachments".
 *
 * @property int $id
 * @property string $category
 * @property string $descriptions
 * @property string $attachment
 * @property string $upload_time
 */
class UsefulAttachments extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public $file;

    public static function tableName()
    {
        return 'useful_attachments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category', 'descriptions', 'attachment', 'upload_time'], 'required'],
            [['upload_time'], 'safe'],
            [['file'], 'file'],
            [['category'], 'string', 'max' => 15],
            [['descriptions'], 'string', 'max' => 225],
            [['attachment'], 'string', 'max' => 250],            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'category' => Yii::t('app', 'Category'),
            'descriptions' => Yii::t('app', 'Descriptions'),
            'attachment' => Yii::t('app', 'Attachment'),
            'upload_time' => Yii::t('app', 'Upload Time'),
            'file' => Yii::t('app', 'Select Attachment'),
        ];
    }
}
