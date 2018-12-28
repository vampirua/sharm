<?php

use backend\modules\statusorder\models\StatusOrder;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\order\models\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Заказы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

    <h1><?= Html::encode($this->title)?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <p>
            <?php /** @var  $user_id */
    if (\Yii::$app->user->can('admin', ['author_id' => $user_id])): ?>
        <?= Html::a('Создать продукт', ['create'], ['class' => 'btn btn-success']) ?>
    <?php endif; ?>

    </p>



    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            ['attribute' => 'time', 'label' => 'Дата заказа'],
            ['attribute' => 'comments', 'label' => 'Коментарий'],
            ['attribute' => 'user_id', 'label' => 'Пользиватель'],
            [
                'attribute' => 'status_order',
                'label' => 'Статус заказа',
                'value' => function ($model) {
                    return $model->status->name;
                },
                'filter' => ArrayHelper::map(StatusOrder::find()->all(), 'id', 'name')
            ],

            ['class' => 'yii\grid\ActionColumn', 'template' => '{view} {update}'],
        ],
    ]); ?>
</div>
