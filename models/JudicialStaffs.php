<?php

namespace app\models;

use Yii;
use app\models\LocationMapping;
use app\models\JudiciaryDesignations;

/**
 * This is the model class for table "judicial_staffs".
 *
 * @property int $id
 * @property string $name
 * @property int $designation
 * @property int $current_place
 */
class JudicialStaffs extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'judicial_staffs';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'designation', 'current_place'], 'required'],
            [['designation', 'current_place'], 'integer'],
            [['name'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Name'),
            'designation' => Yii::t('app', 'Designation'),
            'current_place' => Yii::t('app', 'Current Place/Court'),
        ];
    }

     /**
     * @return \yii\db\ActiveQuery
     */
    public function getDesignations()
    {
       return $this->hasOne(JudiciaryDesignations::className(), ['id' => 'designation']);
    }

      /**
     * @return \yii\db\ActiveQuery
     */
    public function getCourt()
    {
       return $this->hasOne(LocationMapping::className(), ['id' => 'current_place']);
    }
}
