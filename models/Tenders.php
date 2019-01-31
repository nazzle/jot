<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tenders".
 *
 * @property int $id
 * @property string $tender_no
 * @property string $title
 * @property string $closing_date
 * @property string $attacment
 * @property int $published_by
 * @property string $time
 */
class Tenders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */

    public $file;

    public static function tableName()
    {
        return 'tenders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tender_no', 'title', 'closing_date', 'attachment', 'published_by', 'time'], 'required'],
            [['published_by'], 'integer'],
            [['time'], 'safe'],
            [['file'], 'file'],
            [['tender_no'], 'string', 'max' => 100],
            [['title'], 'string', 'max' => 225],
            [['closing_date', 'attachment'], 'string', 'max' => 225],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'tender_no' => Yii::t('app', 'Tender No'),
            'title' => Yii::t('app', 'Title'),
            'closing_date' => Yii::t('app', 'Closing Date'),
            'attacment' => Yii::t('app', 'Attacment'),
            'published_by' => Yii::t('app', 'Published By'),
            'time' => Yii::t('app', 'Published Date'),
            'file' => Yii::t('app', 'attachment'),
        ];
    }

     /**
     * @return \yii\db\ActiveQuery
     */
    public function getNamez()
    {
       return $this->hasOne(User::className(), ['id' => 'published_by']);
    }
}
