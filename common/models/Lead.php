<?php

namespace common\models;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%leads}}".
 *
 * @property int $id [int(11)]
 * @property string $state [varchar(25)]
 * @property int $created_by [int(11)]
 * @property int $service_id [int(11)]
 * @property int $dealer_id [int(11)]
 * @property int $brand_id [int(11)]
 * @property string $source [varchar(25)]
 * @property int $consumer_id [int(11)]
 * @property int $address_id [int(11)]
 * @property int $created_at [int(11)]
 * @property int $updated_at [int(11)]
 */
class Lead extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return '{{%leads}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['state', 'created_by', 'service_id', 'dealer_id', 'brand_id', 'consumer_id', 'address_id', 'created_at', 'updated_at'], 'required'],
            [['created_by', 'service_id', 'dealer_id', 'brand_id', 'consumer_id', 'address_id', 'created_at', 'updated_at'], 'integer'],
            [['state', 'source'], 'string', 'max' => 25],
            [['brand_id'], 'exist', 'skipOnError' => true, 'targetClass' => Companies::class, 'targetAttribute' => ['brand_id' => 'id']],
            [['dealer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Companies::class, 'targetAttribute' => ['dealer_id' => 'id']],
            [['address_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProfileAddresses::class, 'targetAttribute' => ['address_id' => 'id']],
            [['service_id'], 'exist', 'skipOnError' => true, 'targetClass' => Services::class, 'targetAttribute' => ['service_id' => 'id']],
            [['consumer_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['consumer_id' => 'id']],
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
            'state' => Yii::t('frontend', 'State'),
            'created_by' => Yii::t('frontend', 'Created By'),
            'service_id' => Yii::t('frontend', 'Service ID'),
            'dealer_id' => Yii::t('frontend', 'Dealer ID'),
            'brand_id' => Yii::t('frontend', 'Brand ID'),
            'source' => Yii::t('frontend', 'Source'),
            'consumer_id' => Yii::t('frontend', 'Consumer ID'),
            'address_id' => Yii::t('frontend', 'Address ID'),
            'created_at' => Yii::t('frontend', 'Created At'),
            'updated_at' => Yii::t('frontend', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[Address]].
     *
     * @return ActiveQuery
     */
    public function getAddress()
    {
        return $this->hasOne(ProfileAddresses::className(), ['id' => 'address_id']);
    }

    /**
     * Gets query for [[Brand]].
     *
     * @return ActiveQuery
     */
    public function getBrand()
    {
        return $this->hasOne(Companies::class, ['id' => 'brand_id']);
    }

    /**
     * Gets query for [[Consumer]].
     *
     * @return ActiveQuery
     */
    public function getConsumer()
    {
        return $this->hasOne(User::class, ['id' => 'consumer_id']);
    }

    /**
     * Gets query for [[CreatedBy]].
     *
     * @return ActiveQuery
     */
    public function getCreatedBy()
    {
        return $this->hasOne(User::class, ['id' => 'created_by']);
    }

    /**
     * Gets query for [[Dealer]].
     *
     * @return ActiveQuery
     */
    public function getDealer()
    {
        return $this->hasOne(Companies::class, ['id' => 'dealer_id']);
    }

    /**
     * Gets query for [[LeadsNotes]].
     *
     * @return ActiveQuery
     */
    public function getLeadsNotes()
    {
        return $this->hasMany(LeadsNotes::className(), ['lead_id' => 'id']);
    }

    /**
     * Gets query for [[Service]].
     *
     * @return ActiveQuery
     */
    public function getService()
    {
        return $this->hasOne(Services::className(), ['id' => 'service_id']);
    }
}
