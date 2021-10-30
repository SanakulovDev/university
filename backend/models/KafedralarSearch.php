<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Kafedralar;

/**
 * KafedralarSearch represents the model behind the search form of `backend\models\Kafedralar`.
 */
class KafedralarSearch extends Kafedralar
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'fakultet_id'], 'integer'],
            [['kafedra_nomi', 'fakultet_haqida'], 'safe'],
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
        $query = Kafedralar::find();

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

        $query->andFilterWhere(['like', 'kafedra_nomi', $this->kafedra_nomi])
            ->andFilterWhere(['like', 'fakultet_haqida', $this->fakultet_haqida]);

        return $dataProvider;
    }
}
