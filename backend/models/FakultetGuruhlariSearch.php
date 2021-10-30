<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\FakultetGuruhlari;

/**
 * FakultetGuruhlariSearch represents the model behind the search form of `backend\models\FakultetGuruhlari`.
 */
class FakultetGuruhlariSearch extends FakultetGuruhlari
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'fakultet_id'], 'integer'],
            [['guruh_raqami'], 'safe'],
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
        $query = FakultetGuruhlari::find();

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
            'fakultet_id' => $this->fakultet_id,
        ]);

        $query->andFilterWhere(['like', 'guruh_raqami', $this->guruh_raqami]);

        return $dataProvider;
    }
}
