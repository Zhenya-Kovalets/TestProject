<?php

use yii\db\Migration;

/**
 * Class m220405_085101_create_table_notifications
 */
class m220405_085101_create_table_notifications extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci ENGINE=InnoDB';

        $this->createTable('{{%notifications}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(11)->notNull(),
            'type' => $this->string(20)->notNull(),
            'subject' => $this->string(255)->notNull(),
            'content' => $this->text()->notNull(),
            'status' => $this->boolean()->defaultValue(1),
            'created_at' => $this->integer(11)->notNull(),
            'updated_at' => $this->integer(11)->notNull(),
        ], $tableOptions);

        $this->createIndex('notifications_user_id_fk', '{{%notifications}}', 'user_id');

        $this->addForeignKey(
            'notifications_user_id_fk',
            '{{%notifications}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('notifications_user_id_fk', '{{%notifications}}');

        $this->dropIndex('notifications_user_id_fk', '{{%notifications}}');

        $this->dropTable('{{%notifications}}');
    }

}
