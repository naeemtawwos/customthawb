<?php

use yii\db\Migration;

/**
 * Class m180726_095312_altercolum_delivery_status_orders_hept_table
 */
class m180726_095312_altercolum_delivery_status_orders_hept_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->alterColumn('orders_hept', 'delivery_status', "ENUM('ordered', 'shipped', 'delivered')");        
        
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180726_095312_altercolum_delivery_status_orders_hept_table cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180726_095312_altercolum_delivery_status_orders_hept_table cannot be reverted.\n";

        return false;
    }
    */
}
