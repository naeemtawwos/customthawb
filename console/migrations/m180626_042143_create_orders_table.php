<?php

use yii\db\Migration;

/**
 * Handles the creation of table `orders`.
 */
class m180626_042143_create_orders_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        
        
        
        $this->createTable('orders', [
            'id' => $this->primaryKey(),
            'customerid' => $this->integer()->notNull(),
            'order_dt' => $this->integer()->notNull(),
            'payment_method' => $this->integer()->notNull(),
            'paymentid' => $this->integer()->notNull(),
            'thawb_type' => $this->integer()->notNull(),
            'collar_type' => $this->integer()->notNull(),
            'fabric' => $this->integer()->notNull(),
            'pocket_style' => $this->integer()->notNull(),
            'buttons' => $this->integer()->notNull(),
            'thread' => $this->integer()->notNull(),
            'sleeves' => $this->integer()->notNull(),
            'thawb_length' => $this->float()->notNull(),
            'half_chest_measure' => $this->float()->notNull(),
            'half_waist_measure' => $this->float()->notNull(),
            'lower_width' => $this->float()->notNull(),
            'neck_body' => $this->float()->notNull(),
            'sleave_length' => $this->float()->notNull(),
            'wrist_body' => $this->float()->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(1),
            'order_tailor_dt' => $this->integer()->notNull(),
            'stitched_dt' => $this->integer()->notNull(),
            'parcelled_dt' => $this->integer()->notNull(),
            'delivered_dt' => $this->integer()->notNull(),
            'shipping_address1' =>   $this->text()->notNull(),
            'shipping_address1' =>   $this->text(),
            'shipping_city' =>   $this->string(20)->notNull()->unique(),
            'shipping_zipcode' =>   $this->string(20)->notNull()->unique(),
            'shipping_country' =>   $this->string(2)->notNull(),
        ]);
        
        
        $this->createIndex(
            'idx-orders-customerid',
            'orders',
            'customerid'
            );
        
        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-orders-customerid',
            'orders',
            'customerid',
            'user',
            'id',
            'CASCADE'
            );
    /*
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
            'payment_table',
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
            'countries_table',
            'id',
            'CASCADE'
            );
        
      */  
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        
       /* $this->dropForeignKey(
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
        
       
        $this->dropForeignKey(
            'fk-orders-customerid',
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
        
 
        $this->dropIndex(
            'idx-orders-customerid',
            'orders'
            );
*/        
        $this->dropTable('orders');
    }
    
    
    
}
