<?php

use yii\db\Migration;

/**
 * Handles the creation of table `orders`.
 * Has foreign keys to the tables:
 *
 * - `user`
 * - `products`
 */
class m180725_085440_create_orders_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('orders_hept', [
            'id' => $this->primaryKey(),
            'qty' => $this->integer(),
            'price' => $this->float(),
            'purchasedate' => $this->date(),            
            'customer_id' => $this->integer()->notNull(),
            'product_id' => $this->integer(),
        ]);

        // creates index for column `customer_id`
        $this->createIndex(
            'idx-orders-h-customer_id',
            'orders_hept',
            'customer_id'
        );

        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-orders-h-customer_id',
            'orders_hept',
            'customer_id',
            'user',
            'id',
            'CASCADE'
        );

        // creates index for column `product_id`
        $this->createIndex(
            'idx-orders-h-product_id',
            'orders_hept',
            'product_id'
        );

        // add foreign key for table `products`
        $this->addForeignKey(
            'fk-orders-h-product_id',
            'orders_hept',
            'product_id',
            'products',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `user`
        $this->dropForeignKey(
            'fk-orders-h-customer_id',
            'orders_hept'
        );

        // drops index for column `customer_id`
        $this->dropIndex(
            'idx-orders-h-customer_id',
            'orders_hept'
        );

        // drops foreign key for table `products`
        $this->dropForeignKey(
            'fk-orders-h-product_id',
            'orders_hept'
        );

        // drops index for column `product_id`
        $this->dropIndex(
            'idx-orders-h-product_id',
            'orders_hept'
        );

        $this->dropTable('orders_hept');
    }
}
