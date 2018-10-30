<?php

use yii\db\Migration;

/**
 * Handles adding date_create to table `publication`.
 */
class m181028_224837_add_date_create_column_to_publication_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('publication', 'date_create', $this->datetime());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('publication', 'date_create');
    }
}
