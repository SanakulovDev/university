<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\FakultetDekan;

/**
 * FakultetDekanSearch represents the model behind the search form of `backend\models\FakultetDekan`.
 */
class FakultetDekanSearch extends FakultetDekan
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'fakultet_id'], 'integer'],
            [['dekan_ismi', 'dekan_familiyasi', 'qabul_vaqti', 'telefon', 'email', 'image', 'dekan_haqida'], 'safe'],
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
        $query = FakultetDekan::find();

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

        $query->andFilterWhere(['like', 'dekan_ismi', $this->dekan_ismi])
            ->andFilterWhere(['like', 'dekan_familiyasi', $this->dekan_familiyasi])
            ->andFilterWhere(['like', 'qabul_vaqti', $this->qabul_vaqti])
            ->andFilterWhere(['like', 'telefon', $this->telefon])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'image', $this->image])
            ->andFilterWhere(['like', 'dekan_haqida', $this->dekan_haqida]);

        return $dataProvider;
    }
}
