<?php

namespace frontend\controllers;

use yii\web\Controller;
use Yii;
use yii\filters\AccessControl;

/**
 * Site controller
 */
class LeadController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['index', 'edit'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index', 'edit'],
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    public function actionIndex() {

    }

    public function actionView() {

        $faker = Factory::create();

        $lead = new DynamicModel(['Service' ,'Brands' ,'Address','Name' ,'phone']);
        $lead->lead = $faker;
        $lead[] = [
            $lead=$faker->Service->text(20),
            $lead->Brands=$faker->text(50),
            $lead->Address=$faker->address(),
            $lead->Name=$faker->userName(20),
            $lead->phone=$faker->phoneNumber(20),
		];




        return $this->render('view',$lead=['lead']);
    }

    public function actionEdit() {

    }

}
