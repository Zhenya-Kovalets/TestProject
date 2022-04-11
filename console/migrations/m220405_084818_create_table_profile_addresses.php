<?php

use yii\db\Migration;

/**
 * Class m220405_084818_create_table_profile_addresses
 */
class m220405_084818_create_table_profile_addresses extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci ENGINE=InnoDB';

        $this->createTable('{{%profile_addresses}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(11)->notNull(),
            'name' => $this->string(255)->notNull(),
            'zip_code' => $this->string(10)->notNull(),
            'street_address' => $this->string(255)->notNull(),
            'city' => $this->string(100)->notNull(),
            'state' => $this->string(100)->notNull(),
            'country' => $this->string(80)->notNull(),
            'active' => $this->boolean()->defaultValue(1),
            'created_at' => $this->integer(11)->notNull(),
            'updated_at' => $this->integer(11)->notNull(),
        ], $tableOptions);

        $this->createIndex('profile_addresses_user_id_fk', '{{%profile_addresses}}', 'user_id');

        $this->addForeignKey(
            'profile_addresses_user_id_fk',
            '{{%profile_addresses}}',
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
        $this->dropForeignKey('profile_addresses_user_id_fk', '{{%profile_addresses}}');

        $this->dropIndex('profile_addresses_user_id_fk', '{{%profile_addresses}}');

        $this->dropTable('{{%profile_addresses}}');
    }

}
