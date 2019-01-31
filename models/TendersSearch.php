<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Tenders;

/**
 * TendersSearch represents the model behind the search form of `app\models\Tenders`.
 */
class TendersSearch extends Tenders
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'published_by'], 'integer'],
            [['tender_no', 'title', 'closing_date', 'attachment', 'time'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Tenders::find();

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
            'published_by' => $this->published_by,
            'time' => $this->time,
        ]);

        $query->andFilterWhere(['like', 'tender_no', $this->tender_no])
            ->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'closing_date', $this->closing_date])
            ->andFilterWhere(['like', 'attachment', $this->attachment]);

        return $dataProvider;
    }
}
