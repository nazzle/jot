<?php

namespace app\models;

use Yii;

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
            [['division', 'case_no', 'attachment'], 'required'],
            [['division'], 'integer'],
            [['descriptions'], 'string'],
            [['case_no'], 'string', 'max' => 50],
            [['parties'], 'string', 'max' => 225],
            [['attachment'], 'string', 'max' => 25],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'division' => Yii::t('app', 'Division'),
            'case_no' => Yii::t('app', 'Case No'),
            'parties' => Yii::t('app', 'Parties'),
            'descriptions' => Yii::t('app', 'Descriptions'),
            'attachment' => Yii::t('app', 'Attachment'),
        ];
    }
}