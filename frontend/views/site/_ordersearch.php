<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OrdersSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orders-search">

    <?php $form = ActiveForm::begin([
        'action' => ['orders'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'customerid') ?>

    <?= $form->field($model, 'order_dt') ?>

    <?= $form->field($model, 'payment_method') ?>

    <?= $form->field($model, 'paymentid') ?>

    <?php // echo $form->field($model, 'thawb_type') ?>

    <?php // echo $form->field($model, 'collar_type') ?>

    <?php // echo $form->field($model, 'fabric') ?>

    <?php // echo $form->field($model, 'pocket_style') ?>

    <?php // echo $form->field($model, 'buttons') ?>

    <?php // echo $form->field($model, 'thread') ?>

    <?php // echo $form->field($model, 'sleeves') ?>

    <?php // echo $form->field($model, 'thawb_length') ?>

    <?php // echo $form->field($model, 'half_chest_measure') ?>

    <?php // echo $form->field($model, 'half_waist_measure') ?>

    <?php // echo $form->field($model, 'lower_width') ?>

    <?php // echo $form->field($model, 'neck_body') ?>

    <?php // echo $form->field($model, 'sleave_length') ?>

    <?php // echo $form->field($model, 'wrist_body') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'order_tailor_dt') ?>

    <?php // echo $form->field($model, 'stitched_dt') ?>

    <?php // echo $form->field($model, 'parcelled_dt') ?>

    <?php // echo $form->field($model, 'delivered_dt') ?>

    <?php // echo $form->field($model, 'shipping_address1') ?>

    <?php // echo $form->field($model, 'shipping_city') ?>

    <?php // echo $form->field($model, 'shipping_zipcode') ?>

    <?php // echo $form->field($model, 'shipping_country') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
