<?php

use yii\db\Migration;

/**
 * Class m220406_135213_add_user_fields_2
 */
class m220406_135213_add_user_fields_2 extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%user}}', 'company_id', $this->integer(11)->after('phone')->defaultValue(null));

        $this->createIndex('user_companies_id_fk', '{{%user}}', 'company_id');

        $this->addForeignKey(
            'user_companies_id_fk',
            '{{%user}}',
            'company_id',
            '{{%companies}}',
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
        $this->dropForeignKey('user_companies_id_fk', '{{%user}}');

        $this->dropIndex('user_companies_id_fk', '{{%user}}');

        $this->dropColumn('{{%user}}', 'company_id');
    }

}
