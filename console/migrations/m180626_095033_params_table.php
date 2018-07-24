<?php

use yii\db\Migration;

/**
 * Class m180626_095033_params_table
 */
class m180626_095033_params_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('params', [
            'id' => $this->integer()->unique()->notNull(),
            'param_type' => $this->string(5)->notNull(),
            'param_des' => $this->string(20)->notNull(),
        ]);
        $this->alterColumn('params', 'id', 'integer not null auto_increment');
        $this->addPrimaryKey('params_pk','params',['param_type','param_des'] );
        
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
         
        
        $this->dropPrimaryKey('params_pk', 'params');
        
        $this->dropTable('params');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180626_095033_params_table cannot be reverted.\n";

        return false;
    }
    */
}
