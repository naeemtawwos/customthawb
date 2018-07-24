<?php

use yii\db\Migration;

/**
 * Handles the creation of table `payment`.
 */
class m180626_060441_create_payment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('payment', [
            'id' => $this->primaryKey(),
            'orderid' => $this->integer(),
            'payment_dt' => $this->integer(),
            'pay_method' => $this->integer(),
            'status' => $this->integer(),
        ]);
        
        $this->createIndex(
            'idx-payment-orderid',
            'payment',
            'orderid'
            );
        
        $this->createIndex(
            'idx-payment-paymethod',
            'payment',
            'pay_method'
            );
        
        
        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-payment-orderid',
            'payment',
            'orderid',
            'orders',
            'id',
            'CASCADE'
            );
        
        
        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-payment-pay_method',
            'payment',
            'pay_method',
            'payment_method',
            'id',
            'CASCADE'
            );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        
        
        $this->dropForeignKey(
            'fk-payment-orderid',
            'payment'
            );
        
        $this->dropForeignKey(
            'fk-payment-pay_method',
            'payment'
            );
        
        
        $this->dropIndex(
            'idx-payment-orderid',
            'payment'
            );
        
        $this->dropIndex(
            'idx-payment-paymethod',
            'payment'
            );
        
        
        
        
        
        $this->dropTable('payment');
    }
}
