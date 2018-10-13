<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Judgments;

/**
 * JudgmentsSearch represents the model behind the search form of `app\models\Judgments`.
 */
class JudgmentsSearch extends Judgments
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'division'], 'integer'],
            [['case_no', 'parties', 'descriptions', 'attachment'], 'safe'],
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
        $query = Judgments::find();

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
            'division' => $this->division,
        ]);

        $query->andFilterWhere(['like', 'case_no', $this->case_no])
            ->andFilterWhere(['like', 'parties', $this->parties])
            ->andFilterWhere(['like', 'descriptions', $this->descriptions])
            ->andFilterWhere(['like', 'attachment', $this->attachment]);

        return $dataProvider;
    }
}
