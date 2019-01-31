<?php

namespace app\models;

use Yii;
use app\models\WhoIsWho;

/**
 * This is the model class for table "staff_profile".
 *
 * @property int $id
 * @property int $staff_id
 * @property string $title
 * @property string $profile
 */
class StaffProfile extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'staff_profile';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['staff_id', 'title', 'profile'], 'required'],
            [['staff_id'], 'integer'],
            [['profile'], 'string'],
            [['title'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'staff_id' => Yii::t('app', 'Staff ID'),
            'title' => Yii::t('app', 'Title'),
            'profile' => Yii::t('app', 'Profile'),
        ];
    }

     /**
     * @return \yii\db\ActiveQuery
     */
    public function getWho()
    {
        return $this->hasOne(WhoIsWho::className(), ['id' => 'staff_id']);
    }
}
