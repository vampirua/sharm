<?php

use backend\assets\AppAsset;
use backend\modules\statusproduct\models\Statusproduct;
use nullref\category\models\Category;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\product\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
AppAsset::register($this);
$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;

?>
<div class="product-index admin-img">

    <h1>Продукт</h1>
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

            //'id',
            ['attribute' => 'name', 'label' => 'Название'],
            ['attribute' => 'price', 'label' => 'Цена'],
            ['attribute' => 'code', 'label' => 'Артикул'],
            ['attribute' => 'min_quantity', 'label' => 'Мин.Заказ Кол-н'],
            ['attribute' => 'vendor_id', 'label' => 'Страна Изготов.'],
            ['attribute' => 'material', 'label' => 'Материал'],

            [
                'attribute' => 'category_id',
                'value' => function ($model) {
                    return $model->category->title;
                },
                'filter' => ArrayHelper::map(Category::find()->all(), 'id', 'title'),
                'label' => 'Категория',
            ],
            ['attribute' => 'photo_product', 'label' => 'Фото', 'format' => 'image'],
            [
                'attribute' => 'status_product',
                'value' => function ($model) {
                    return $model->statusProduct->name;
                },
                'filter' => ArrayHelper::map(Statusproduct::find()->all(), 'id', 'name'),
                'label' => 'Статус'
            ],


            ['class' => 'yii\grid\ActionColumn', 'template' => '{view} {update}'],
        ],
    ]); ?>
</div>
