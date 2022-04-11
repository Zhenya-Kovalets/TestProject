<?php

namespace common\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%areas}}".
 *
 * @property int $id [int(11)]
 * @property int $frequency [int(11)]
 * @property string $zip_code [varchar(10)]
 */
class Areas extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return '{{%areas}}';
    }

}
