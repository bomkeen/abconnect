<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\JobDetailList;

/**
 * JobDetailListSearch represents the model behind the search form of `app\models\JobDetailList`.
 */
class JobDetailListSearch extends JobDetailList
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['job_detail_list_id', 'job_detail_id', 'user_create', 'user_update'], 'integer'],
            [['line1', 'line2', 'line3', 'line4', 'line5', 'line6', 'line7', 'line8', 'line9', 'line10', 'waranty'], 'safe'],
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
        $query = JobDetailList::find();

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
            'job_detail_list_id' => $this->job_detail_list_id,
            'job_detail_id' => $this->job_detail_id,
            'user_create' => $this->user_create,
            'user_update' => $this->user_update,
        ]);

        $query->andFilterWhere(['like', 'line1', $this->line1])
            ->andFilterWhere(['like', 'line2', $this->line2])
            ->andFilterWhere(['like', 'line3', $this->line3])
            ->andFilterWhere(['like', 'line4', $this->line4])
            ->andFilterWhere(['like', 'line5', $this->line5])
            ->andFilterWhere(['like', 'line6', $this->line6])
            ->andFilterWhere(['like', 'line7', $this->line7])
            ->andFilterWhere(['like', 'line8', $this->line8])
            ->andFilterWhere(['like', 'line9', $this->line9])
            ->andFilterWhere(['like', 'line10', $this->line10])
            ->andFilterWhere(['like', 'waranty', $this->waranty]);

        return $dataProvider;
    }
}
