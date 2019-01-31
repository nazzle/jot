<?php

namespace app\modules\land\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\land\models\LandPosts;

/**
 * LandPostsSearch represents the model behind the search form of `app\modules\land\models\LandPosts`.
 */
class LandPostsSearch extends LandPosts
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'likes', 'dislikes', 'location_id', 'author'], 'integer'],
            [['attachment', 'title', 'descriptions', 'time', 'status'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = LandPosts::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'likes' => $this->likes,
            'dislikes' => $this->dislikes,
            'time' => $this->time,
            'location_id' => $this->location_id,
            'author' => $this->author,
        ]);

        $query->andFilterWhere(['like', 'attachment', $this->attachment])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'descriptions', $this->descriptions])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
