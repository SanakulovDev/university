<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Rektor;

/**
 * RektorSearch represents the model behind the search form of `backend\models\Rektor`.
 */
class RektorSearch extends Rektor
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['ismi', 'familiyasi', 'otasining_ismi', 'telefon', 'email', 'qabul_vaqti', 'vazifalari'], 'safe'],
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
        $query = Rektor::find();

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
        ]);

        $query->andFilterWhere(['like', 'ismi', $this->ismi])
            ->andFilterWhere(['like', 'familiyasi', $this->familiyasi])
            ->andFilterWhere(['like', 'otasining_ismi', $this->otasining_ismi])
            ->andFilterWhere(['like', 'telefon', $this->telefon])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'qabul_vaqti', $this->qabul_vaqti])
            ->andFilterWhere(['like', 'vazifalari', $this->vazifalari]);

        return $dataProvider;
    }
}
