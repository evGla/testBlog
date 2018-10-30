<?php

use yii\db\Migration;

/**
 * Handles adding date_update to table `publication`.
 */
class m181028_225118_add_date_update_column_to_publication_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('publication', 'date_update', $this->datetime());
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('publication', 'date_update');
    }
}
