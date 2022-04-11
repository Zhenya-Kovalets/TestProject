<?php

namespace backend\controllers;

use common\models\Notification;
use yii\data\ActiveDataProvider;
use yii\debug\models\timeline\DataProvider;
use yii\grid\GridView;
use yii\web\Controller;



class NotificationController extends Controller
{

    public function actionIndex(): string
    {
        $rows = Notification::find();
        $provider = new ActiveDataProvider([
            'query' => $rows,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        return $this->render('notification',['provider'=>$provider]);
    }

}