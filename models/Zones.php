<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "zones".
 *
 * @property int $id
 * @property string $zone
 */
class Zones extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zones';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['zone'], 'required'],
            [['zone'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'zone' => Yii::t('app', 'Zone'),
        ];
    }
}
