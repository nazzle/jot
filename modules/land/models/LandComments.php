<?php

namespace app\modules\land\models;

use Yii;

/**
 * This is the model class for table "land_comments".
 *
 * @property int $id
 * @property int $post_id
 * @property string $username
 * @property string $comment
 */
class LandComments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'land_comments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['post_id', 'username', 'comment'], 'required'],
            [['post_id'], 'integer'],
            [['comment'], 'string'],
            [['username'], 'string', 'max' => 25],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'post_id' => Yii::t('app', 'Post ID'),
            'username' => Yii::t('app', 'Username'),
            'comment' => Yii::t('app', 'Comment'),
        ];
    }
}
