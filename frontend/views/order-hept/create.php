<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\OrdersHept */

$this->title = 'Create Orders Hept';
$this->params['breadcrumbs'][] = ['label' => 'Orders Hepts', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-hept-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
