<?php

use yii\db\Migration;

/**
 * Class m220405_085041_create_table_leads_notes
 */
class m220405_085041_create_table_leads_notes extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci ENGINE=InnoDB';

        $this->createTable('{{%leads_notes}}', [
            'id' => $this->primaryKey(),
            'content' => $this->text()->notNull(),
            'lead_id' => $this->integer(11)->notNull(),
            'created_by' => $this->integer(11)->defaultValue(0),
            'created_at' => $this->integer(11)->notNull(),
            'updated_at' => $this->integer(11)->notNull(),
        ], $tableOptions);

        $this->createIndex('leads_notes_leads_id_fk', '{{%leads_notes}}', 'lead_id');

        $this->addForeignKey(
            'leads_notes_leads_id_fk',
            '{{%leads_notes}}',
            'lead_id',
            '{{%leads}}',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->createIndex('leads_notes_user_id_fk', '{{%leads_notes}}', 'created_by');

        $this->addForeignKey(
            'leads_notes_user_id_fk',
            '{{%leads_notes}}',
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
        $this->dropForeignKey('leads_notes_leads_id_fk', '{{%leads_notes}}');

        $this->dropIndex('leads_notes_leads_id_fk', '{{%leads_notes}}');

        $this->dropForeignKey('leads_notes_user_id_fk', '{{%leads_notes}}');

        $this->dropIndex('leads_notes_user_id_fk', '{{%leads_notes}}');

        $this->dropTable('{{%leads_notes}}');
    }

}
