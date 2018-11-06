<?php

use yii\db\Migration;

/**
 * Class m181101_162852_alter_table_column_names
 */
class m181101_162852_alter_table_column_names extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->renameColumn('publication', 'id', 'publicationId');
        $this->renameColumn('publication', 'date_create', 'dateCreate');
        $this->renameColumn('publication', 'date_update', 'dateUpdate');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->renameColumn('publication', 'publicationId', 'id');
        $this->renameColumn('publication', 'dateCreate', 'date_create');
        $this->renameColumn('publication', 'dateUpdate', 'date_update');
    }


    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m181101_162852_alter_table_column_names cannot be reverted.\n";

        return false;
    }
    */
}
