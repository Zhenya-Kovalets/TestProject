<?php

use yii\db\Migration;

/**
 * Class m220405_125702_create_table_service_company_area
 */
class m220405_125702_create_table_service_company_area extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci ENGINE=InnoDB';

        $this->createTable('{{%service_company_area}}', [
            'id' => $this->primaryKey(),
            'service_id' => $this->integer(11)->notNull(),
            'company_id' => $this->integer(11)->notNull(),
            'area_id' => $this->integer(11)->notNull(),
        ], $tableOptions);

        $this->createIndex('service_company_area_services_id_fk', '{{%service_company_area}}', 'service_id');

        $this->addForeignKey(
            'service_company_area_services_id_fk',
            '{{%service_company_area}}',
            'service_id',
            '{{%services}}',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->createIndex('service_company_area_companies_id_fk', '{{%service_company_area}}', 'company_id');

        $this->addForeignKey(
            'service_company_area_companies_id_fk',
            '{{%service_company_area}}',
            'company_id',
            '{{%companies}}',
            'id',
            'CASCADE',
            'CASCADE'
        );

        $this->createIndex('service_company_area_areas_id_fk', '{{%service_company_area}}', 'area_id');

        $this->addForeignKey(
            'service_company_area_areas_id_fk',
            '{{%service_company_area}}',
            'area_id',
            '{{%areas}}',
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
        $this->dropForeignKey('service_company_area_services_id_fk', '{{%service_company_area}}');

        $this->dropForeignKey('service_company_area_companies_id_fk', '{{%service_company_area}}');

        $this->dropForeignKey('service_company_area_areas_id_fk', '{{%service_company_area}}');

        $this->dropIndex('service_company_area_services_id_fk', '{{%service_company_area}}');

        $this->dropIndex('service_company_area_companies_id_fk', '{{%service_company_area}}');

        $this->dropIndex('service_company_area_areas_id_fk', '{{%service_company_area}}');

        $this->dropTable('{{%service_company_area}}');
    }

}
