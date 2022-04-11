<?php

namespace common\models;

use yii\db\ActiveRecord;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "{{%services}}".
 *
 * @property int $id
 * @property string $name
 * @property int $created_at
 * @property int $updated_at
 *
 * @property Leads[] $leads
 * @property ServiceCompanyArea[] $serviceCompanyAreas
 * @property ServiceTag[] $serviceTags
 */
class Services extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return '{{%services}}';
    }
    /**
     * Gets query for [[ServiceCompanyAreas]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompanies()
    {
        return $this->hasMany(ServiceCompanyArea::class, ['service_id' => 'id']);
    }

    /**
     * Gets query for [[ServiceTags]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getTags(): ActiveQuery
    {
        return $this->hasMany(Tags::class, ['id' => 'tag_id'])->viaTable(ServiceTag::tableName(), ['item_id' => 'id']);
    }

}
