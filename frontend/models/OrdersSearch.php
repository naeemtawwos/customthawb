<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Orders;

/**
 * OrdersSearch represents the model behind the search form of `app\models\Orders`.
 */
class OrdersSearch extends Orders
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'customerid', 'order_dt', 'payment_method', 'paymentid', 'thawb_type', 'collar_type', 'fabric', 'pocket_style', 'buttons', 'thread', 'sleeves', 'status', 'order_tailor_dt', 'stitched_dt', 'parcelled_dt', 'delivered_dt'], 'integer'],
            [['thawb_length', 'half_chest_measure', 'half_waist_measure', 'lower_width', 'neck_body', 'sleave_length', 'wrist_body'], 'number'],
            [['shipping_address1', 'shipping_city', 'shipping_zipcode', 'shipping_country'], 'safe'],
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
        $query = Orders::find();

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
            'customerid' => $this->customerid,
            'order_dt' => $this->order_dt,
            'payment_method' => $this->payment_method,
            'paymentid' => $this->paymentid,
            'thawb_type' => $this->thawb_type,
            'collar_type' => $this->collar_type,
            'fabric' => $this->fabric,
            'pocket_style' => $this->pocket_style,
            'buttons' => $this->buttons,
            'thread' => $this->thread,
            'sleeves' => $this->sleeves,
            'thawb_length' => $this->thawb_length,
            'half_chest_measure' => $this->half_chest_measure,
            'half_waist_measure' => $this->half_waist_measure,
            'lower_width' => $this->lower_width,
            'neck_body' => $this->neck_body,
            'sleave_length' => $this->sleave_length,
            'wrist_body' => $this->wrist_body,
            'status' => $this->status,
            'order_tailor_dt' => $this->order_tailor_dt,
            'stitched_dt' => $this->stitched_dt,
            'parcelled_dt' => $this->parcelled_dt,
            'delivered_dt' => $this->delivered_dt,
        ]);

        $query->andFilterWhere(['like', 'shipping_address1', $this->shipping_address1])
            ->andFilterWhere(['like', 'shipping_city', $this->shipping_city])
            ->andFilterWhere(['like', 'shipping_zipcode', $this->shipping_zipcode])
            ->andFilterWhere(['like', 'shipping_country', $this->shipping_country]);

        return $dataProvider;
    }
}
