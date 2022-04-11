<?php



/* @var $this \yii\web\View */
/* @var $provider \yii\data\ActiveDataProvider */

use yii\grid\GridView;

echo GridView::widget([
    'dataProvider' => $provider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        'id',
        'user_id',
        'type:string',
        'subject:string',
        'content:text',
        'status:text',
        'content:text',
        'created_at',
        'updated_at',

        ['class' => 'yii\grid\ActionColumn'],
    ],
]);