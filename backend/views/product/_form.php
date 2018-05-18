<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use nullref\category\models\Category;
use app\models\Vendor;
use yii\helpers\ArrayHelper;
use mihaildev\elfinder\InputFile;


/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'code')->textInput() ?>
    <?php
    $vendor = vendor::find()->all();
    $vendor_items = ArrayHelper::map($vendor, 'id', 'country')
    ?>
    <?= $form->field($model, 'vendor_id')->dropDownList($vendor_items) ?>

    <?= $form->field($model, 'material')->textInput(['maxlength' => true]) ?>
    <?php
    $category = category::find()->all();
    $items = ArrayHelper::map($category, 'id', 'title')
    ?>
    <?= $form->field($model, 'category_id')->dropDownList($items) ?>

    <?= $form->field($model, 'photo_product')->widget(InputFile::className(), [
        'language'      => 'ru',
        'controller'    => 'elfinder', // вставляем название контроллера, по умолчанию равен elfinder
        'filter'        => 'image',    // фильтр файлов, можно задать массив фильтров https://github.com/Studio-42/elFinder/wiki/Client-configuration-options#wiki-onlyMimes
        'template'      => '<div class="input-group">{input}<span class="input-group-btn">{button}</span></div>',
        'options'       => ['class' => 'form-control'],
        'buttonOptions' => ['class' => 'btn btn-default'],
        'multiple'      => false       // возможность выбора нескольких файлов
    ]); ?>




    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
