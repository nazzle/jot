<?php

namespace app\models;

use Yii;
use app\models\Divisions;

/**
 * This is the model class for table "cause_list".
 *
 * @property int $id
 * @property string $dates
 * @property string $case_number
 * @property string $parties
 * @property int $witness
 * @property string $advocate_plaintiff
 * @property string $advocate_defendant
 * @property int $division
 */
class CauseList extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */

    public $excel;

    public static function tableName()
    {
        return 'cause_list';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['dates', 'case_number', 'parties', 'witness', 'advocate_plaintiff', 'advocate_defendant', 'division'], 'required'],
            [['witness', 'division'], 'integer'],
            [['excel'], 'file'],
            [['dates', 'parties'], 'string', 'max' => 225],
            [['case_number'], 'string', 'max' => 115],
            [['advocate_plaintiff', 'advocate_defendant'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'dates' => Yii::t('app', 'Dates'),
            'case_number' => Yii::t('app', 'Case Number'),
            'parties' => Yii::t('app', 'Parties'),
            'witness' => Yii::t('app', 'Witness'),
            'advocate_plaintiff' => Yii::t('app', 'Advocate Plaintiff'),
            'advocate_defendant' => Yii::t('app', 'Advocate Defendant'),
            'division' => Yii::t('app', 'Division'),
            'excel' => Yii::t('app', 'Excel File'),
        ];
    }

     /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiv()
    {
       return $this->hasOne(Divisions::className(), ['id' => 'division']);
    }
}
