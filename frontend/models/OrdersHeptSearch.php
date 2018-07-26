<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\OrdersHept;

/**
 * OrdersHeptSearch represents the model behind the search form of `app\models\OrdersHept`.
 */
class OrdersHeptSearch extends OrdersHept
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'qty', 'customer_id', 'product_id'], 'integer'],
            [['price'], 'number'],
            [['purchasedate', 'delivery_status'], 'safe'],
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
        $query = OrdersHept::find();

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
            'qty' => $this->qty,
            'price' => $this->price,
            'purchasedate' => $this->purchasedate,
            'customer_id' => $this->customer_id,
            'product_id' => $this->product_id,
        ]);

        $query->andFilterWhere(['like', 'delivery_status', $this->delivery_status]);

        return $dataProvider;
    }
}
