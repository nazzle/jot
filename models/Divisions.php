<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "divisions".
 *
 * @property int $id
 * @property int $zone_id
 * @property string $division
 */
class Divisions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'divisions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['zone_id', 'division'], 'required'],
            [['zone_id'], 'integer'],
            [['division'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'zone_id' => Yii::t('app', 'Zone ID'),
            'division' => Yii::t('app', 'Division'),
        ];
    }
}
