<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TermMeta;

/**
 * TermMetaSearch represents the model behind the search form of `backend\models\TermMeta`.
 */
class TermMetaSearch extends TermMeta
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['meta_id', 'term_id'], 'integer'],
            [['meta_key', 'meta_value'], 'safe'],
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
        $query = TermMeta::find();

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
            'meta_id' => $this->meta_id,
            'term_id' => $this->term_id,
        ]);

        $query->andFilterWhere(['like', 'meta_key', $this->meta_key])
            ->andFilterWhere(['like', 'meta_value', $this->meta_value]);

        return $dataProvider;
    }
}
