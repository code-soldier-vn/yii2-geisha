<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Comments;

/**
 * CommentsSearch represents the model behind the search form of `backend\models\Comments`.
 */
class CommentsSearch extends Comments
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['comment_id', 'comment_post_id', 'comment_author', 'comment_karma', 'comment_parent', 'user_id', 'created_at', 'updated_at'], 'integer'],
            [['comment_author_email', 'comment_author_url', 'comment_author_ip', 'comment_content', 'comment_approved', 'comment_agent', 'comment_type'], 'safe'],
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
        $query = Comments::find();

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
            'comment_id' => $this->comment_id,
            'comment_post_id' => $this->comment_post_id,
            'comment_author' => $this->comment_author,
            'comment_karma' => $this->comment_karma,
            'comment_parent' => $this->comment_parent,
            'user_id' => $this->user_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'comment_author_email', $this->comment_author_email])
            ->andFilterWhere(['like', 'comment_author_url', $this->comment_author_url])
            ->andFilterWhere(['like', 'comment_author_ip', $this->comment_author_ip])
            ->andFilterWhere(['like', 'comment_content', $this->comment_content])
            ->andFilterWhere(['like', 'comment_approved', $this->comment_approved])
            ->andFilterWhere(['like', 'comment_agent', $this->comment_agent])
            ->andFilterWhere(['like', 'comment_type', $this->comment_type]);

        return $dataProvider;
    }
}
