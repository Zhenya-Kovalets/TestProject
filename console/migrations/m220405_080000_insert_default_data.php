<?php

use yii\db\Migration;

/**
 * Class m220405_121940_insert_default_data
 */
class m220405_080000_insert_default_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->batchInsert('{{%user}}', ['id', 'username', 'f_name', 'l_name', 'email', 'phone', 'password_hash', 'auth_key', 'unconfirmed_email', 'registration_ip', 'flags', 'confirmed_at', 'blocked_at', 'updated_at', 'created_at', 'last_login_at', 'last_login_ip', 'auth_tf_key', 'auth_tf_enabled', 'password_changed_at', 'gdpr_consent', 'gdpr_consent_date', 'gdpr_deleted'], [
            [1, '+375296303025', 'Dmitry', 'Admin', 'dmitry@yellowhat.com', '+375296303025', '$2y$10$gKxNKKg8IdFQV3T/9nCHaeB96W2ub/DTxK/e/6RfFwO7sfv82QJt2', 'Qmrctu31j-EG88VXQ-0mzaqQvaq1Zk8X', null, '127.0.0.1', 0, 1648547633, null, 1648547633, 1648547633, 1648547633, '127.0.0.1', '', 0, 1648547633, 1, 1648547633, 0],
        ]);

        $this->batchInsert('{{%profile}}', ['user_id', 'zip_code', 'street_address', 'city', 'state', 'country', 'phone_secondary', 'public_email', 'timezone', 'bio'], [
            [1, null, null, null, null, null, null, 'dmitry@yellowhat.com', 'Europe/Minsk', null],
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('{{%user}}', ['id' => 1]);
    }

}
