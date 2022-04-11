<?php

namespace common\models;

use Da\User\Model\Profile as BaseProfile;
use Da\User\Validator\TimeZoneValidator;
use Yii;

/**
 * @property int $user_id [int(11)]
 * @property string $zip_code [varchar(10)]
 * @property string $street_address [varchar(255)]
 * @property string $city [varchar(100)]
 * @property string $state [varchar(100)]
 * @property string $country [varchar(80)]
 * @property string $phone_secondary [varchar(21)]
 * @property string $public_email [varchar(255)]
 * @property string $timezone [varchar(40)]
 *
 * @property User $user
 */
class Profile extends BaseProfile
{
    /**
     * {@inheritdoc}
     */
    public function rules(): array
    {
        return [
            [['zip_code', 'street_address', 'city', 'state', 'country', 'phone_secondary', 'public_email', 'bio'], 'filter', 'filter' => 'trim'],
            [['zip_code'], 'string', 'max' => 10],
            [['street_address'], 'string', 'max' => 255],
            [['city', 'state'], 'string', 'max' => 100],
            [['country'], 'string', 'max' => 80],
            [['public_email'], 'email'],
            // phone rules
            'phonePattern' => [['phone_secondary'], 'match', 'pattern' => '/^\+[0-9]{7,20}$/', 'message' => Yii::t('user', 'Wrong format, enter phone number in international format.')],

            'timeZoneValidation' => ['timezone',
                function ($attribute) {
                    if ($this->make(TimeZoneValidator::class, [$this->{$attribute}])->validate() === false) {
                        $this->addError($attribute, Yii::t('usuario', 'Time zone is not valid'));
                    }
                },
            ],

            [['bio'], 'string'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels(): array
    {
        return [
            'zip_code' => Yii::t('user', 'Zip Code'),
            'street_address' => Yii::t('user', 'Address'),
            'city' => Yii::t('user', 'City'),
            'state' => Yii::t('user', 'State'),
            'country' => Yii::t('user', 'Country'),
            'phone_secondary' => Yii::t('user', 'Phone Secondary'),
            'public_email' => Yii::t('usuario', 'Email (public)'),
            'timezone' => Yii::t('usuario', 'Time zone'),
            'bio' => Yii::t('user', 'Comment'),
        ];
    }

}