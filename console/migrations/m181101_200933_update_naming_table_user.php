<?php

use yii\db\Migration;

/**
 * Class m181101_200933_update_naming_table_user
 */
class m181101_200933_update_naming_table_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->renameColumn('user', 'id', 'userId');
        $this->renameColumn('user', 'created_at', 'createdAt');
        $this->renameColumn('user', 'updated_at', 'updatedAt');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->renameColumn('user', 'userId', 'id');
        $this->renameColumn('user', 'createdAt', 'created_at');
        $this->renameColumn('user', 'updatedAt', 'updated_at');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181101_200933_update_naming_table_user cannot be reverted.\n";

        return false;
    }
    */
}
