<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\OrdersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Orders');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create Orders'), ['create-order'], ['class' => 'btn btn-success']) ?>
    </p>

    <?=
    
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'customerid',
            'order_dt',
            //'payment_method',
            //'paymentid',
            'thawb_type',
            //'collar_type',
            'fabric',
            //'pocket_style',
            //'buttons',
            //'thread',
            //'sleeves',
            //'thawb_length',
            //'half_chest_measure',
            //'half_waist_measure',
            //'lower_width',
            //'neck_body',
            //'sleave_length',
            //'wrist_body',
            //'status',
            //'order_tailor_dt',
            //'stitched_dt',
            //'parcelled_dt',
            //'delivered_dt',
            //'shipping_address1:ntext',
            //'shipping_city',
            //'shipping_zipcode',
            //'shipping_country',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    <?php Pjax::end(); ?>
</div>
