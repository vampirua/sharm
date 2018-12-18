<?php
/**
 * Created by PhpStorm.
 * User: Dimon
 * Date: 22.05.2018
 * Time: 12:51
 */


use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

AppAsset::register($this);
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm
/* @var $model \common\models\RegistrationForm */

?>

<div class="container">
    <?php $form = ActiveForm::begin(['id' => 'registration-form']) ?>
    <?= $form->field($model, 'username')->textInput() ?>
    <?= $form->field($model, 'phone')->textInput() ?>
    <?= $form->field($model, 'email')->input('email'); ?>
    <?= $form->field($model, 'password')->passwordInput() ?>
    <div class="form-group">
        <div>
            <?= Html::submitButton('Регистрация', ['class' => 'btn btn-success']) ?>
        </div>
    </div>
    <?php ActiveForm::end() ?>
</div>
