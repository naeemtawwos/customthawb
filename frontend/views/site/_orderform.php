<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Orders */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orders-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'customerid')->textInput() ?>

    <?= $form->field($model, 'order_dt')->textInput() ?>

    <?= $form->field($model, 'payment_method')->textInput() ?>

    <?= $form->field($model, 'paymentid')->textInput() ?>

    <?= $form->field($model, 'thawb_type')->textInput() ?>

    <?= $form->field($model, 'collar_type')->textInput() ?>

    <?= $form->field($model, 'fabric')->textInput() ?>

    <?= $form->field($model, 'pocket_style')->textInput() ?>

    <?= $form->field($model, 'buttons')->textInput() ?>

    <?= $form->field($model, 'thread')->textInput() ?>

    <?= $form->field($model, 'sleeves')->textInput() ?>

    <?= $form->field($model, 'thawb_length')->textInput() ?>

    <?= $form->field($model, 'half_chest_measure')->textInput() ?>

    <?= $form->field($model, 'half_waist_measure')->textInput() ?>

    <?= $form->field($model, 'lower_width')->textInput() ?>

    <?= $form->field($model, 'neck_body')->textInput() ?>

    <?= $form->field($model, 'sleave_length')->textInput() ?>

    <?= $form->field($model, 'wrist_body')->textInput() ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'order_tailor_dt')->textInput() ?>

    <?= $form->field($model, 'stitched_dt')->textInput() ?>

    <?= $form->field($model, 'parcelled_dt')->textInput() ?>

    <?= $form->field($model, 'delivered_dt')->textInput() ?>

    <?= $form->field($model, 'shipping_address1')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'shipping_city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'shipping_zipcode')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'shipping_country')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
