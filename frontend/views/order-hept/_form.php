<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OrdersHept */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orders-hept-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'delivery_status')->dropDownList(['ordered'=>'ordered', 'shipped'=>'shipped', 'delivered'=>'delivered']) ?>
    
    <?php

    //$form->field($model, 'customer_id')->textInput() 
    ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
