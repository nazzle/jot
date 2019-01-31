<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "location_mapping".
 *
 * @property int $id
 * @property string $location_name
 */
class LocationMapping extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'location_mapping';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['location_name'], 'required'],
            [['location_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'location_name' => Yii::t('app', 'Location Name'),
        ];
    }
}
