<?php

use yii\db\Migration;

/**
 * Class m180626_070213_add_foreign_keys
 */
class m180626_070213_add_foreign_keys extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createIndex(
            'idx-orders-paymentmethod',
            'orders',
            'payment_method');
        
        $this->addForeignKey(
            'fk-orders-paymentmethod',
            'orders',
            'payment_method',
            'payment_method',
            'id',
            'CASCADE'
            );
        
        $this->createIndex(
            'idx-orders-paymentid',
            'orders',
            'paymentid');
        
        $this->addForeignKey(
            'fk-orders-paymentid',
            'orders',
            'paymentid',
            'payment',
            'id',
            'CASCADE'
            );
        
        
        $this->createIndex(
            'idx-orders-country',
            'orders',
            'shipping_country');
       
        $this->addForeignKey(
            'fk-orders-countries',
            'orders',
            'shipping_country',
            'countries',
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
         'fk-orders-paymentmethod',
         'orders'
         );
        
         $this->dropForeignKey(
         'fk-orders-paymentid',
         'orders'
         );
         
         $this->dropForeignKey(
         'fk-orders-countries',
         'orders'
         );
         
 
         $this->dropIndex(
         'idx-orders-country',
         'orders'
         );
         
         
         $this->dropIndex(
         'idx-orders-paymentid',
         'orders'
         );
         
         $this->dropIndex(
         'idx-orders-paymentmethod',
         'orders'
         );
         
         

    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180626_070213_add_foreign_keys cannot be reverted.\n";

        return false;
    }
    */
}
