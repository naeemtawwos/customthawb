<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OrdersHeptSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Orders Hepts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-hept-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Orders Hept', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'qty',
            'price',
            'purchasedate',
            'customer_id',
            //'product_id',
            'delivery_status',

            ['class' => 'yii\grid\ActionColumn', 'template' => '{view}{update}'],
        ],
    ]); ?>
</div>
