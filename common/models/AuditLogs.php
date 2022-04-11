<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "{{%audit_logs}}".
 *
 * @property int $id [int(11)]
 * @property string $model [varchar(25)]
 * @property int $entity_id [int(11)]
 * @property int $created_by [int(11)]
 * @property string $action [varchar(25)]
 * @property string $details
 * @property int $created_at [int(11)]
 * @property int $updated_at [int(11)]
 *
 * @property-read ActiveQuery $createdBy
 */
class AuditLogs extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return '{{%audit_logs}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['model', 'entity_id', 'created_by', 'created_at', 'updated_at'], 'required'],
            [['entity_id', 'created_by', 'created_at', 'updated_at'], 'integer'],
            [['details'], 'string'],
            [['model', 'action'], 'string', 'max' => 25],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['created_by' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => Yii::t('frontend', 'ID'),
            'model' => Yii::t('frontend', 'Model'),
            'entity_id' => Yii::t('frontend', 'Entity ID'),
            'created_by' => Yii::t('frontend', 'Created By'),
            'action' => Yii::t('frontend', 'Action'),
            'details' => Yii::t('frontend', 'Details'),
            'created_at' => Yii::t('frontend', 'Created At'),
            'updated_at' => Yii::t('frontend', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return ActiveQuery
     */
    public function getCreatedBy(): ActiveQuery
    {
        return $this->hasOne(User::class, ['id' => 'created_by']);
    }
}
