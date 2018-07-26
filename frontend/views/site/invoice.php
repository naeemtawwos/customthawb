<?php



use yii\helpers\Html;
use yii\swiftmailer\Mailer;
use yii\debug\models\search\Mail;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Invoice for orderno'.$model->id);
$this->params['breadcrumbs'][] = $this->title;
?>

<style>
.table{
width:60%;
}
.table thead tr th{
vertical-align: middle;
//font-size: 0.9em;
}
th.right{
text-align: right;
}
.table tbody tr th{
font-weight: normal;
vertical-align: middle;
//font-size: 0.9em;
}


}
</style>
<div class="products-index">

   <h3><?= Html::encode($this->title) ?></h3>
   <div> 
    Buyer: <?= 
    Yii::$app->db->createCommand("select username from user where id =:id")
    ->bindValue(":id", Yii::$app->getUser()->getId())->queryOne()['username']?>
  </div> 
  <table class="table">
  <thead><tr><th>qty</th>
    <th>description</th><th>unit price</th></tr>
    </thead>
    <tbody>
    <tr><th><?=$model->qty?></th>
    <th><?=$product->name?></th><th><?=$product->price?></th></tr>
    <th colspan="3" style="text-align:right">Total Amount: <?= $model->qty*$product->price ?></th></tr>
    </thead>
    </tbody>
  </table>
  
  <?php
  
  $mail = Yii::$app->mailer->compose()->setFrom("test@heptagon.com")
  ->setTo(Yii::$app->db->createCommand("select email from user where id =:id")
    ->bindValue(":id", Yii::$app->getUser()->getId())->queryOne()['email'])
    ->setSubject('Invoice');
   
  $mail->setHtmlBody(
      "<table>
      <thead><tr><th>qty</th>
      <th>description</th><th>unit price</th></tr>
      </thead>
      <tbody>
      <tr><th>".$model->qty."</th>
    <th>".$product->name."</th><th>".$product->price."</th></tr>
    <th colspan='3' style='text-align:right'>Total Amount: ".( $model->qty*$product->price)."</th></tr>
    </thead>
    </tbody>
  </table>");
  $mail->send();
  ?>
  
  
 <p>A copy of this invoice has been sent to your registered email address</p>
  
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

</div>
