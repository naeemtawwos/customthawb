<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Orders */

$this->title = Yii::t('app', 'Update Orders: ' . $model->id, [
    'nameAttribute' => '' . $model->id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Orders'), 'url' => ['orders']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view-order', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update Order');
?>
<div class="orders-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_orderform', [
        'model' => $model,
    ]) ?>

</div>