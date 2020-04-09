<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Product;

/**
 * ProductSearch represents the model behind the search form of `app\models\Product`.
 */
class ProductSearch extends Product {

    ///// reration fillter
    public $producttype;
    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['product_id', 'product_type_id'], 'integer'],
                ///// reration fillter
            [['product_name', 'producttype'], 'safe'],
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
        $query = Product::find();

            ///// reration fillter
        $query->joinWith('producttype');
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

            ///// reration fillter
        $dataProvider->sort->attributes['producttype'] = [
        // The tables are the ones our relation are configured to
        // in my case they are prefixed with "tbl_"
        'asc' => ['product_type.product_type_name' => SORT_ASC],
        'desc' => ['product_type.product_type_name' => SORT_DESC],
    ];
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'product_id' => $this->product_id,
            'product_type_id' => $this->product_type_id,
        ])
    ///// reration fillter
        ->andFilterWhere(['like', 'product_name.product_type_name', $this->product_name])
        ->andFilterWhere(['like', 'product_type.product_type_name', $this->producttype]);

        return $dataProvider;
    }

}
