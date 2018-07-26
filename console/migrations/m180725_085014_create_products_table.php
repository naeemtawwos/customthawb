<?php

use yii\db\Migration;

/**
 * Handles the creation of table `products`.
 */
class m180725_085014_create_products_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('products', [
            'id' => $this->primaryKey(),
            'name' => $this->string(30),
            'type' => $this->integer(),
            'stockqty' => $this->integer(),
            'price' => $this->float(),
            'description' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('products');
    }
}
