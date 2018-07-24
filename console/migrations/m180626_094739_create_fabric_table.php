<?php

use yii\db\Migration;

/**
 * Handles the creation of table `fabric`.
 */
class m180626_094739_create_fabric_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('fabric', [
            'id' => $this->primaryKey(),
            'des' => $this->string(20)->notNull(),
            'color' => $this->string(12)->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('fabric');
    }
}
