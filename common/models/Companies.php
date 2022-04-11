<?php

namespace common\models;

use yii\db\ActiveRecord;
use Yii;

/**
 * This is the model class for table "{{%Companies}}".
 *
 * @property int $id [int(11)]
 * @property string $name [varchar(255)]
 * @property string $logo_url [varchar(255)]
 * @property string $type [varchar(10)]
 * @property int $created_at [int(11)]
 * @property int $updated_at [int(11)]
 */
class Companies extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return '{{%companies}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['name', 'type', 'created_at', 'updated_at'], 'required'],
            [['created_at', 'updated_at'], 'integer'],
            [['name', 'logo_url'], 'string', 'max' => 255],
            [['type'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => Yii::t('frontend', 'ID'),
            'name' => Yii::t('frontend', 'Name'),
            'logo_url' => Yii::t('frontend', 'Logo Url'),
            'type' => Yii::t('frontend', 'Type'),
            'created_at' => Yii::t('frontend', 'Created At'),
            'updated_at' => Yii::t('frontend', 'Updated At'),
        ];
    }
}
