<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\OrdersHept */

$this->title = 'Update Orders Hept: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Orders Hepts', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="orders-hept-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
