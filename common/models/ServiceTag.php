<?php

namespace common\models;

use yii\db\ActiveRecord;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "{{%service_tags}}".
 *
 * @property int $service_id [int(11)]
 * @property int $tag_id [int(11)]
 *
 * @property-read ActiveQuery $service
 * @property-read ActiveQuery $tag
 */
class ServiceTag extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return '{{%service_tags}}';
    }

    /**
     * Gets query for [[Service]].
     *
     * @return ActiveQuery
     */
    public function getService(): ActiveQuery
    {
        return $this->hasOne(Services::class, ['id' => 'service_id']);
    }

    /**
     * Gets query for [[Tag]].
     *
     * @return ActiveQuery
     */
    public function getTag(): ActiveQuery
    {
        return $this->hasOne(Tags::class, ['id' => 'tag_id']);
    }
}
