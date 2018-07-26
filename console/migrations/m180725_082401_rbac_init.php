<?php

use yii\db\Migration;

/**
 * Class m180725_082401_rbac_init
 */
class m180725_082401_rbac_init extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $auth = Yii::$app->authManager;        
        $crud = $auth->createPermission('crud-on-products');
        $auth->add($crud);
        $admin = $auth->createRole('admin');
        $admin->description = 'Administrator';
        $auth->add($admin);
        $auth->addChild($admin, $crud);                
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m180725_082401_rbac_init cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m180725_082401_rbac_init cannot be reverted.\n";

        return false;
    }
    */
}
