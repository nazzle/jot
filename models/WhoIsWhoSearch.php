<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\WhoIsWho;

/**
 * WhoIsWhoSearch represents the model behind the search form of `app\models\WhoIsWho`.
 */
class WhoIsWhoSearch extends WhoIsWho
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'posted_by'], 'integer'],
            [['photo', 'name', 'position'], 'safe'],
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
        $query = WhoIsWho::find();

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
            'posted_by' => $this->posted_by,
        ]);

        $query->andFilterWhere(['like', 'photo', $this->photo])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'position', $this->position]);

        return $dataProvider;
    }
}
