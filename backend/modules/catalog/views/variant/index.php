<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\modules\catalog\models\VariantSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Variants';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="variant-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Variant', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'color_id',
            'size',
            'amount',
            'product_id',
            'price',
//            'variant_photo',
            'quantity',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
