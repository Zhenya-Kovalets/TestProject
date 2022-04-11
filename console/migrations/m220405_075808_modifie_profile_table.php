<?php

use yii\db\Migration;

/**
 * Class m220405_075808_add_profile_fields
 */
class m220405_075808_modifie_profile_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropColumn('{{%profile}}', 'name');

        $this->dropColumn('{{%profile}}', 'gravatar_email');

        $this->dropColumn('{{%profile}}', 'gravatar_id');

        $this->dropColumn('{{%profile}}', 'location');

        $this->dropColumn('{{%profile}}', 'website');

        $this->addColumn('{{%profile}}', 'zip_code', $this->string(10)->after('user_id'));

        $this->addColumn('{{%profile}}', 'street_address', $this->string(255)->after('zip_code'));

        $this->addColumn('{{%profile}}', 'city', $this->string(100)->after('street_address'));

        $this->addColumn('{{%profile}}', 'state', $this->string(100)->after('city'));

        $this->addColumn('{{%profile}}', 'country', $this->string(80)->after('state'));

        $this->addColumn('{{%profile}}', 'phone_secondary', $this->string(21)->after('country'));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%profile}}', 'zip_code');

        $this->dropColumn('{{%profile}}', 'street_address');

        $this->dropColumn('{{%profile}}', 'city');

        $this->dropColumn('{{%profile}}', 'state');

        $this->dropColumn('{{%profile}}', 'country');

        $this->dropColumn('{{%profile}}', 'phone_secondary');

        $this->addColumn('{{%profile}}', 'name', $this->string(255)->after('user_id'));

        $this->addColumn('{{%profile}}', 'gravatar_email', $this->string(255)->after('public_email'));

        $this->addColumn('{{%profile}}', 'gravatar_id', $this->string(32)->after('gravatar_email'));

        $this->addColumn('{{%profile}}', 'location', $this->string(255)->after('gravatar_id'));

        $this->addColumn('{{%profile}}', 'website', $this->string(255)->after('location'));
    }

}
