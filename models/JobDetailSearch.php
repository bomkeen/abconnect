<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\JobDetail;

/**
 * JobDetailSearch represents the model behind the search form of `app\models\JobDetail`.
 */
class JobDetailSearch extends JobDetail
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['job_detail_id', 'job_id', 'product_id','user_create','user_update'], 'integer'],
            [['job_detail', 'product_detail'], 'safe'],
            [['cost','price','num','total_cost','total_price'], 'number'],
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
        $query = JobDetail::find();

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
            'job_detail_id' => $this->job_detail_id,
            'job_id' => $this->job_id,
            'product_id' => $this->product_id,
            'cost' => $this->cost,
            'price'=>$this->price,
            'num'=>$this->num,
            'total_cost'=>$total_cost,
            'total_price'=>$total_price,
            'user_create'=>$this->user_create,
            'user_update'=>  $this->user_update
                
        ]);

        $query->andFilterWhere(['like', 'job_detail', $this->job_detail])
            ->andFilterWhere(['like', 'product_detail', $this->product_detail]);

        return $dataProvider;
    }
}
