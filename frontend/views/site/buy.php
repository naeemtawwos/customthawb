<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OrdersHept */
/* @var $form ActiveForm */
?>
<div class="buy" style="width:15%;">
<?php $id=($model['product_id']);

?>
    <?php $form = ActiveForm::begin(['method'=>"get",'action' => 'index.php?r=site/confirm&id='.$id]); ?>	
    	
        <?= $form->field($model, 'qty') ?>        
        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- buy -->
