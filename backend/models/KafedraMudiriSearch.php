<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\KafedraMudiri;

/**
 * KafedraMudiriSearch represents the model behind the search form of `backend\models\KafedraMudiri`.
 */
class KafedraMudiriSearch extends KafedraMudiri
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'kafedra_id'], 'integer'],
            [['mudir_ismi', 'mudir_familiyasi', 'qabul_vaqti', 'telefon', 'email', 'image'], 'safe'],
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
        $query = KafedraMudiri::find();

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
            'kafedra_id' => $this->kafedra_id,
        ]);

        $query->andFilterWhere(['like', 'mudir_ismi', $this->mudir_ismi])
            ->andFilterWhere(['like', 'mudir_familiyasi', $this->mudir_familiyasi])
            ->andFilterWhere(['like', 'qabul_vaqti', $this->qabul_vaqti])
            ->andFilterWhere(['like', 'telefon', $this->telefon])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'image', $this->image]);

        return $dataProvider;
    }
}
