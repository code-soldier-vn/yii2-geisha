<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\TermTaxonomy;

/**
 * TermTaxonomySearch represents the model behind the search form of `backend\models\TermTaxonomy`.
 */
class TermTaxonomySearch extends TermTaxonomy
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['term_taxonomy_id', 'term_id', 'parent', 'count'], 'integer'],
            [['taxonomy', 'description'], 'safe'],
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
        $query = TermTaxonomy::find();

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
            'term_taxonomy_id' => $this->term_taxonomy_id,
            'term_id' => $this->term_id,
            'parent' => $this->parent,
            'count' => $this->count,
        ]);

        $query->andFilterWhere(['like', 'taxonomy', $this->taxonomy])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}
