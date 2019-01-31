<?php

namespace app\models;

use Yii;
use app\models\Posts;

/**
 * This is the model class for table "comments".
 *
 * @property int $id
 * @property int $post_id
 * @property string $username
 * @property string $comment
 */
class Comments extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'comments';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['post_id', 'username', 'comment', 'status'], 'required'],
            [['post_id', 'status'], 'integer'],
            [['comment'], 'string'],
            [['time'], 'safe'],
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
            'time' => Yii::t('app', 'Time'),
            'status' => Yii::t('app', 'Status'),
        ];
    }

     /**
     * @return \yii\db\ActiveQuery
     */
    public function getPostid()
    {
       return $this->hasOne(Posts::className(), ['id' => 'post_id']);
    }
}
