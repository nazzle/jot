<?php

namespace app\models;

use Yii;
use app\models\User;

/**
 * This is the model class for table "judgments".
 *
 * @property int $id
 * @property int $division
 * @property string $case_no
 * @property string $parties
 * @property string $descriptions
 * @property string $attachment
 */
class Judgments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public $judgment;

    public static function tableName()
    {
        return 'judgments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['division', 'case_no', 'published_by', 'time'], 'required'],
            [['division', 'published_by'], 'integer'],
            [['judgment'], 'file'],
            [['date_of_decision'], 'safe'],
            [['descriptions'], 'string'],
            [['case_no'], 'string', 'max' => 50],
            [['parties'], 'string', 'max' => 225],
            [['attachment'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'division' => Yii::t('app', 'Court/Division/Zone'),
            'case_no' => Yii::t('app', 'Case No'),
            'parties' => Yii::t('app', 'Parties'),
            'descriptions' => Yii::t('app', 'Descriptions'),
            'attachment' => Yii::t('app', 'Attachment'),
            'judgment' => Yii::t('app', 'Judgment File'),
        ];
    }

     /**
     * @return \yii\db\ActiveQuery
     */
    public function getName()
    {
       return $this->hasOne(User::className(), ['id' => 'published_by']);
    }

     /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocation()
    {
       return $this->hasOne(LocationMapping::className(), ['id' => 'division']);
    }
}
