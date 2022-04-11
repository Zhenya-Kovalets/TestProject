<?php

use yii\db\Migration;

/**
 * Class m220405_122726_create_table_cervice_tags
 */
class m220405_122726_create_table_cervice_tags extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci ENGINE=InnoDB';

        $this->createTable('{{%service_tags}}', [
            'service_id' => $this->integer(11)->notNull(),
            'tag_id' => $this->integer(11)->notNull(),
        ], $tableOptions);

        $this->createIndex('service_tags_services_id_fk', '{{%service_tags}}', 'service_id');

        $this->addForeignKey(
            'service_tags_services_id_fk',
            '{{%service_tags}}',
            'service_id',
            '{{%services}}',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->createIndex('service_tags_tags_id_fk', '{{%service_tags}}', 'tag_id');

        $this->addForeignKey(
            'service_tags_tags_id_fk',
            '{{%service_tags}}',
            'tag_id',
            '{{%tags}}',
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
        $this->dropForeignKey('service_tags_services_id_fk', '{{%service_tags}}');

        $this->dropForeignKey('service_tags_tags_id_fk', '{{%service_tags}}');

        $this->dropIndex('service_tags_services_id_fk', '{{%service_tags}}');

        $this->dropIndex('service_tags_tags_id_fk', '{{%service_tags}}');

        $this->dropTable('{{%service_tags}}');
    }

}
