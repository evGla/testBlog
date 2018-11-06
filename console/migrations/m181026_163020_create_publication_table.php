<?php

use yii\db\Migration;

/**
 * Handles the creation of table `publication`.
 */
class m181026_163020_create_publication_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        //TODO: rename id to publicationId
        $this->createTable('publication', [
            'id' => $this->primaryKey(),
            'url' => $this->string()->unique(),
            'title' => $this->string()->notNull(),
            'text' => $this->text(),
            'author' => $this->integer(),
            'status' => $this->integer(1),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('publication');
    }
}
