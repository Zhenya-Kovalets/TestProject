<?php

use yii\db\Migration;

/**
 * Class m220325_112045_add_user_fields
 */
class m220325_112045_add_user_fields extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%user}}', 'f_name', $this->string(100)->notNull()->after('username'));

        $this->addColumn('{{%user}}', 'l_name', $this->string(100)->notNull()->after('f_name'));

        $this->addColumn('{{%user}}', 'phone', $this->string(21)->notNull()->after('email'));

        $this->createIndex('idx_user_phone', '{{%user}}', 'phone', true);

        $this->dropIndex('idx_user_email', '{{%user}}');

        $this->alterColumn('{{%user}}', 'email', $this->string(255)->defaultValue(null));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('idx_user_phone', '{{%user}}');

        $this->dropColumn('{{%user}}', 'phone');

        $this->dropColumn('{{%user}}', 'f_name');

        $this->dropColumn('{{%user}}', 'l_name');

        $this->alterColumn('{{%user}}', 'email', $this->string(255)->notNull());

        $this->createIndex('idx_user_email', '{{%user}}', 'email', true);
    }

}
