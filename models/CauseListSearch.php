<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\CauseList;

/**
 * CauseListSearch represents the model behind the search form of `app\models\CauseList`.
 */
class CauseListSearch extends CauseList
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'witness', 'division'], 'integer'],
            [['dates', 'case_number', 'parties', 'advocate_plaintiff', 'advocate_defendant'], 'safe'],
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
        $query = CauseList::find();

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
            'witness' => $this->witness,
            'division' => $this->division,
        ]);

        $query->andFilterWhere(['like', 'dates', $this->dates])
            ->andFilterWhere(['like', 'case_number', $this->case_number])
            ->andFilterWhere(['like', 'parties', $this->parties])
            ->andFilterWhere(['like', 'advocate_plaintiff', $this->advocate_plaintiff])
            ->andFilterWhere(['like', 'advocate_defendant', $this->advocate_defendant]);

        return $dataProvider;
    }
}
