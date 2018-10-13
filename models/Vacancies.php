<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "vacancies".
 *
 * @property int $id
 * @property string $position
 * @property string $duties
 * @property string $type
 * @property string $location
 * @property int $posted_by
 */
class Vacancies extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'vacancies';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['position', 'duties', 'type', 'location', 'posted_by'], 'required'],
            [['duties', 'type'], 'string'],
            [['posted_by'], 'integer'],
            [['position'], 'string', 'max' => 50],
            [['location'], 'string', 'max' => 25],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'position' => Yii::t('app', 'Position'),
            'duties' => Yii::t('app', 'Duties'),
            'type' => Yii::t('app', 'Type'),
            'location' => Yii::t('app', 'Location'),
            'posted_by' => Yii::t('app', 'Posted By'),
        ];
    }
}
