<?php

use yii\db\Migration;

/**
 * Class m220405_123132_create_table_areas
 */
class m220405_123132_create_table_areas extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci ENGINE=InnoDB';

        $this->createTable('{{%areas}}', [
            'id' => $this->primaryKey(),
            'frequency' => $this->integer()->notNull(),
            'zip_code' => $this->string(10)->notNull(),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%areas}}');
    }

}
