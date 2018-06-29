<?php

use app\models\Vendor;
use backend\modules\statusproduct\models\Statusproduct;
use mihaildev\elfinder\InputFile;
use nullref\category\models\Category;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput() ?>


    <?= $form->field($model, 'code')->textInput() ?>

    <?= $form->field($model, 'min_quantity')->textInput() ?>

    <?= $form->field($model, 'material')->textInput(['maxlength' => true]) ?>
    <?php
    $vendor = vendor::find()->all();
    $vendor_items = ArrayHelper::map($vendor, 'id', 'country')
    ?>
    <?= $form->field($model, 'vendor_id')->dropDownList($vendor_items) ?>
    <?php
    $category = category::find()->all();
    $items = ArrayHelper::map($category, 'id', 'title')
    ?>
    <?= $form->field($model, 'category_id')->dropDownList($items) ?>

    <?= $form->field($model, 'photo_product')->widget(InputFile::className(), [
        'language' => 'ru',
        'controller' => 'elfinder', // вставляем название контроллера, по умолчанию равен elfinder
        'filter' => 'image',    // фильтр файлов, можно задать массив фильтров https://github.com/Studio-42/elFinder/wiki/Client-configuration-options#wiki-onlyMimes
        'template' => '<div class="input-group">{input}<span class="input-group-btn">{button}</span></div>',
        'options' => ['class' => 'form-control'],
        'buttonOptions' => ['class' => 'btn btn-default'],
        'multiple' => false       // возможность выбора нескольких файлов
    ]); ?>

    <?php
    $status = Statusproduct::find()->all();
    $status_items = ArrayHelper::map($status, 'id', 'name')
    ?>
    <?= $form->field($model, 'status_product')->dropDownList($status_items) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
