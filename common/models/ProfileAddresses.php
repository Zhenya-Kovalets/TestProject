<?php

namespace common\models;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "{{%profile_addresses}}".
 *
 * @property int $id [int(11)]
 * @property int $user_id [int(11)]
 * @property string $name [varchar(255)]
 * @property string $zip_code [varchar(10)]
 * @property string $street_address [varchar(255)]
 * @property string $city [varchar(100)]
 * @property string $state [varchar(100)]
 * @property string $country [varchar(80)]
 * @property bool $active [tinyint(1)]
 * @property int $created_at [int(11)]
 * @property int $updated_at [int(11)]
 */
class ProfileAddresses extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName(): string
    {
        return '{{%profile_addresses}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['user_id', 'name', 'street_address', 'zip_code', 'city', 'state', 'country', 'created_at', 'updated_at'], 'required'],
            [['user_id', 'active', 'created_at', 'updated_at'], 'integer'],
            [['name', 'street_address'], 'string', 'max' => 255],
            [['zip_code'], 'string', 'max' => 10],
            [['city'], 'string', 'max' => 100],
            [['state'], 'string', 'max' => 50],
            [['country'], 'string', 'max' => 80],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'id' => Yii::t('frontend', 'ID'),
            'user_id' => Yii::t('frontend', 'User ID'),
            'name' => Yii::t('frontend', 'Name'),
            'street_address' => Yii::t('frontend', 'Street Address'),
            'zip_code' => Yii::t('frontend', 'Zip Code'),
            'city' => Yii::t('frontend', 'City'),
            'state' => Yii::t('frontend', 'State'),
            'country' => Yii::t('frontend', 'Country'),
            'active' => Yii::t('frontend', 'Active'),
            'created_at' => Yii::t('frontend', 'Created At'),
            'updated_at' => Yii::t('frontend', 'Updated At'),
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
