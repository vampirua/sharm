<?php

use backend\modules\product\models\Product;
use backend\modules\color\models\Color;
use backend\modules\vendor\models\Vendor;
use nullref\category\models\Category;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CatalogSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-search">

    <?php $form = ActiveForm::begin([
        'action' => ['site/category'],
        'method' => 'get',
    ]); ?>



    <?php
    $category = category::find()->all();
    $items = ArrayHelper::map($category, 'id', 'title')
    ?>
    <?= $form->field($model, 'category_id')->dropDownList($items, ['prompt' => 'Виберіть категорію'])->label('Категорія') ?>
    <?
    $vendor = vendor::find()->all();
    $vendor_items = ArrayHelper::map($vendor, 'id', 'country')
    ?>
    <?= $form->field($model, 'vendor_id')->dropDownList($vendor_items, ['prompt' => 'Виберіть країну'])->label('Виробик') ?>

    <?php
    $size = \backend\modules\catalog\models\Variant::find()->all();
    $size_item = ArrayHelper::map($size, 'size', 'size')
    ?>
    <?= $form->field($model, 'size')->dropDownList($size_item, ['prompt' => 'Виберіть розмір'])->label('Розмір') ?>


        <?
        $color = Color::find()->all();
        $color_items = ArrayHelper::map($color, 'id', 'name')
        ?>
        <?= $form->field($model, 'color_id')->checkboxList($color_items)->label('Колір') ?>


    <?
    $material = Product::find()->select('material')->all();
    $material_items = ArrayHelper::map($material, 'material', 'material')
    ?>
    <?= $form->field($model, 'material')->checkboxList($material_items)->label('Матеріал') ?>

    <div class="row">
        <div class="col-xs-10 text-center">Ціна</div>
        <div class="col-xs-5 text-center">   <?= $form->field($model, 'min_price')->label('Мін') ?></div>
        <div class="col-xs-5 text-center">    <?= $form->field($model, 'max_price')->label('Макс') ?></div>
    </div>


    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
