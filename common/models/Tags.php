<?php

namespace common\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%tags}}".
 *
 * @property int $id
 * @property int $frequency
 * @property string $value
 */
class Tags extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return '{{%tags}}';
    }

}
