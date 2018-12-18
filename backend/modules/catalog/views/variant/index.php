<?php

use backend\assets\AppAsset;
use backend\modules\color\models\Color;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\catalog\models\VariantSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

AppAsset::register($this);
$this->title = 'Варинт продукта';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="variant-index admin-img">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?php /** @var  $user_id */
    if (\Yii::$app->user->can('admin', ['author_id' => $user_id])): ?>
        <?= Html::a('Создать продукт', ['create'], ['class' => 'btn btn-success']) ?>
    <?php endif; ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],


            [
                'attribute' => 'color_id',
                'label' => 'Цвет',
                'value' => function ($model) {
                    return $model->color->name;
                },
                'filter' => ArrayHelper::map(Color::find()->all(), 'id', 'name')
            ],
            ['attribute' => 'size', 'label' => 'Розмер'],
            ['attribute' => 'amount', 'label' => 'Кол.'],
            'product_id',
            ['attribute' => 'price', 'label' => 'Цена вар.'],
            ['attribute' => 'variant_photo', 'label' => 'Фото', 'format' => 'image'],
            'quantity',

            ['class' => 'yii\grid\ActionColumn', 'template' => '{view} {update}'],
        ],
    ]); ?>
</div>
