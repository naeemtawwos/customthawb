<?php

use yii\db\Migration;

/**
 * Handles the creation of table `countries`.
 */
class m180626_055913_create_countries_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('countries', [
            'id' => $this->string(3)->unique(),
            'country' => $this->string(20),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('countries');
    }
}
