<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Talabalar;

/**
 * TalabalarSearch represents the model behind the search form of `backend\models\Talabalar`.
 */
class TalabalarSearch extends Talabalar
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'fakultet_id', 'guruh_id', 'uqish_turi_id', 'talaba_turi_id'], 'integer'],
            [['talaba_ismi', 'talaba_familiyasi', 'talaba_otasining_ismi', 'telefon', 'image'], 'safe'],
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
        $query = Talabalar::find();

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
            'guruh_id' => $this->guruh_id,
            'uqish_turi_id' => $this->uqish_turi_id,
            'talaba_turi_id' => $this->talaba_turi_id,
        ]);

        $query->andFilterWhere(['like', 'talaba_ismi', $this->talaba_ismi])
            ->andFilterWhere(['like', 'talaba_familiyasi', $this->talaba_familiyasi])
            ->andFilterWhere(['like', 'talaba_otasining_ismi', $this->talaba_otasining_ismi])
            ->andFilterWhere(['like', 'telefon', $this->telefon])
            ->andFilterWhere(['like', 'image', $this->image]);

        return $dataProvider;
    }
}
