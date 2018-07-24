<?php

use yii\db\Migration;

/**
 * Class m180706_044322_add_status_to_user_table
 */
class m180706_044322_add_status_to_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('user', 'status', $this->integer());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180706_044322_add_status_to_user_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180706_044322_add_status_to_user_table cannot be reverted.\n";

        return false;
    }
    */
}
