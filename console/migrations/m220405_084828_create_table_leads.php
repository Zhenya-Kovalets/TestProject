<?php

use yii\db\Migration;

/**
 * Class m220405_084828_create_table_leads
 */
class m220405_084828_create_table_leads extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci ENGINE=InnoDB';

        $this->createTable('{{%leads}}', [
            'id' => $this->primaryKey(),
            'token' => $this->string(32)->notNull()->unique(),
            'state' => $this->string(25)->notNull(),
            'created_by' => $this->integer(11)->defaultValue(0), // user_id
            'service_id' => $this->integer(11)->notNull(),
            'dealer_id' => $this->integer(11)->notNull(),
            'brand_id' => $this->integer(11)->notNull(),
            'source' => $this->string(25),
            'consumer_id' => $this->integer(11)->notNull(), // user_id
            'address_id' => $this->integer(11)->notNull(),
            'created_at' => $this->integer(11)->notNull(),
            'updated_at' => $this->integer(11)->notNull(),
        ], $tableOptions);

        $this->createIndex('leads_users_id_created_by_fk', '{{%leads}}', 'created_by');

        $this->addForeignKey(
            'leads_users_id_created_by_fk',
            '{{%leads}}',
            'created_by',
            '{{%user}}',
            'id',
            'SET DEFAULT',
            'CASCADE'
        );

        $this->createIndex('leads_users_id_consumer_id_fk', '{{%leads}}', 'consumer_id');

        $this->addForeignKey(
            'leads_users_id_consumer_id_fk',
            '{{%leads}}',
            'consumer_id',
            '{{%user}}',
            'id',
            'NO ACTION',
            'CASCADE'
        );

        $this->createIndex('leads_services_id_fk', '{{%leads}}', 'service_id');

        $this->addForeignKey(
            'leads_services_id_fk',
            '{{%leads}}',
            'service_id',
            '{{%services}}',
            'id',
            'NO ACTION',
            'CASCADE'
        );

        $this->createIndex('leads_companies_id_dealer_id_fk', '{{%leads}}', 'dealer_id');

        $this->addForeignKey(
            'leads_companies_id_dealer_id_fk',
            '{{%leads}}',
            'dealer_id',
            '{{%companies}}',
            'id',
            'NO ACTION',
            'CASCADE'
        );

        $this->createIndex('leads_companies_id_brand_id_fk', '{{%leads}}', 'brand_id');

        $this->addForeignKey(
            'leads_companies_id_brand_id_fk',
            '{{%leads}}',
            'brand_id',
            '{{%companies}}',
            'id',
            'NO ACTION',
            'CASCADE'
        );

        $this->createIndex('leads_profile_addresses_id_fk', '{{%leads}}', 'address_id');

        $this->addForeignKey(
            'leads_profile_addresses_id_fk',
            '{{%leads}}',
            'address_id',
            '{{%profile_addresses}}',
            'id',
            'NO ACTION',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('leads_users_id_created_by_fk', '{{%leads}}');

        $this->dropForeignKey('leads_users_id_consumer_id_fk', '{{%leads}}');

        $this->dropForeignKey('leads_services_id_fk', '{{%leads}}');

        $this->dropForeignKey('leads_companies_id_dealer_id_fk', '{{%leads}}');

        $this->dropForeignKey('leads_companies_id_brand_id_fk', '{{%leads}}');

        $this->dropForeignKey('leads_profile_addresses_id_fk', '{{%leads}}');

        $this->dropIndex('leads_users_id_created_by_fk', '{{%leads}}');

        $this->dropIndex('leads_users_id_consumer_id_fk', '{{%leads}}');

        $this->dropIndex('leads_services_id_fk', '{{%leads}}');

        $this->dropIndex('leads_companies_id_dealer_id_fk', '{{%leads}}');

        $this->dropIndex('leads_companies_id_brand_id_fk', '{{%leads}}');

        $this->dropIndex('leads_profile_addresses_id_fk', '{{%leads}}');

        $this->dropTable('{{%leads}}');
    }

}
