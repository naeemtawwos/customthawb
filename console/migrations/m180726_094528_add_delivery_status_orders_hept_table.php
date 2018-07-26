<?php

use yii\db\Migration;

/**
 * Class m180726_094528_add_delivery_status_orders_hept_table
 */
class m180726_094528_add_delivery_status_orders_hept_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('orders_hept', 'delivery_status', $this->integer());
        

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180726_094528_add_delivery_status_orders_hept_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180726_094528_add_delivery_status_orders_hept_table cannot be reverted.\n";

        return false;
    }
    */
}
