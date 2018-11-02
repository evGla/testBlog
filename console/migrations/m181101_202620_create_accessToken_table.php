<?php

use yii\db\Migration;

/**
 * Handles the creation of table `accessToken`.
 */
class m181101_202620_create_accessToken_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('accessToken', [
            'accessTokenId' => $this->primaryKey(),
            'token' => $this->string()->notNull()->unique(),
            'userId' => $this->integer(),
            'createdAt' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);

        $this->addForeignKey(
            'fkUserId',
            'accessToken',
            'userId',
            'user',
            'userId',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('accessToken');
    }
}
