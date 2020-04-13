<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Job;

/**
 * JobSearch represents the model behind the search form of `app\models\Job`.
 */
class JobSearch extends Job {

    public $customer;

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['job_id', 'customer_id','user_create','user_update','status','profit_status'], 'integer'],
            [['job_name', 'etc', 'job_date', 'job_update_date', 'customer','status_date'], 'safe'],
            [['total_cost', 'total_profit','total_price','total_vat'], 'number'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios() {
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
    public function search($params) {
        $query = Job::find();
        $query->joinWith('customer');
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $dataProvider->sort->attributes['customer'] = [
            // The tables are the ones our relation are configured to
            // in my case they are prefixed with "tbl_"
            'asc' => ['customer.customer_name' => SORT_ASC],
            'desc' => ['customer.customer_name' => SORT_DESC],
        ];
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'job_id' => $this->job_id,
            'customer_id' => $this->customer_id,
            'total_cost' => $this->total_cost,
            'total_vat'=>$this->total_vat,
            'total_profit' => $this->total_profit,
            'profit_status'=>$this->profit_status,
            'job_date' => $this->job_date,
            'job_update_date' => $this->job_update_date,
            'user_create'=>$this->user_create,
            'user_update'=>  $this->user_update,
            'total_price'=> $this->total_price,
            'status_date'=> $this->status_date,
            'status'=>$this->status
        ]);

        $query->andFilterWhere(['like', 'job_name', $this->job_name])
                ->andFilterWhere(['like', 'customer.customer_name', $this->customer])
                ->andFilterWhere(['like', 'etc', $this->etc]);

        return $dataProvider;
    }

}
