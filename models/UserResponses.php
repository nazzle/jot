<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_responses".
 *
 * @property int $id
 * @property string $username
 * @property string $contact
 * @property string $message_type
 * @property string $message
 */
class UserResponses extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_responses';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'message_type', 'message'], 'required'],
            [['message_type', 'message'], 'string'],
            [['username'], 'string', 'max' => 50],
            [['contact'], 'string', 'max' => 25],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'Username'),
            'contact' => Yii::t('app', 'Contact'),
            'message_type' => Yii::t('app', 'Message Type'),
            'message' => Yii::t('app', 'Message'),
        ];
    }
}
