<?php

use yii\db\Migration;

/**
 * Class m220405_085116_create_table_audit_logs
 */
class m220405_085116_create_table_audit_logs extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci ENGINE=InnoDB';

        $this->createTable('{{%audit_logs}}', [
            'id' => $this->primaryKey(),
            'model' => $this->string(25)->notNull(),
            'entity_id' => $this->integer(11)->notNull(),
            'created_by' => $this->integer(11)->defaultValue(0),
            'action' => $this->string(25),
            'details' => $this->text(),
            'created_at' => $this->integer(11)->notNull(),
            'updated_at' => $this->integer(11)->notNull(),
        ], $tableOptions);

        $this->createIndex('audit_logs_user_id_fk', '{{%audit_logs}}', 'created_by');

        $this->addForeignKey(
            'audit_logs_user_id_fk',
            '{{%audit_logs}}',
            'created_by',
            '{{%user}}',
            'id',
            'SET DEFAULT',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('audit_logs_user_id_fk', '{{%audit_logs}}');

        $this->dropIndex('audit_logs_user_id_fk', '{{%audit_logs}}');

        $this->dropTable('{{%audit_logs}}');
    }

}
