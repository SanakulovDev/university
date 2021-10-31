<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Fanlar;

/**
 * FanlarSearch represents the model behind the search form of `common\models\Fanlar`.
 */
class FanlarSearch extends Fanlar
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'ustozlar_id'], 'integer'],
            [['fanlar_nomi'], 'safe'],
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
        $query = Fanlar::find();

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
            'ustozlar_id' => $this->ustozlar_id,
        ]);

        $query->andFilterWhere(['like', 'fanlar_nomi', $this->fanlar_nomi]);

        return $dataProvider;
    }
}
