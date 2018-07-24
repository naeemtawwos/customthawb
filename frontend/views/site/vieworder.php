<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Orders */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Orders'), 'url' => ['orders']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update-order', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete-order', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'customerid',
            'order_dt',
            'payment_method',
            'paymentid',
            'thawb_type',
            'collar_type',
            'fabric',
            'pocket_style',
            'buttons',
            'thread',
            'sleeves',
            'thawb_length',
            'half_chest_measure',
            'half_waist_measure',
            'lower_width',
            'neck_body',
            'sleave_length',
            'wrist_body',
            'status',
            'order_tailor_dt',
            'stitched_dt',
            'parcelled_dt',
            'delivered_dt',
            'shipping_address1:ntext',
            'shipping_city',
            'shipping_zipcode',
            'shipping_country',
        ],
    ]) ?>

</div>
