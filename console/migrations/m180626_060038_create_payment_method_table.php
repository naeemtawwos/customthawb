<?php

use yii\db\Migration;

/**
 * Handles the creation of table `payment_method`.
 */
class m180626_060038_create_payment_method_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('payment_method', [
            'id' => $this->primaryKey(),
            'desc' => $this->string(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('payment_method');
    }
}
