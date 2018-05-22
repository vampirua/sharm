<?php
/**
 * Created by PhpStorm.
 * User: Dimon
 * Date: 22.05.2018
 * Time: 12:51
 */


use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
/* @var $model \common\models\User */

?>


<?php $form = ActiveForm::begin() ?>
<?= $form->field($model, 'username')->label('Name') ?>
<?= $form->field($model, 'email')->label('Email') ?>
<?= $form->field($model, 'phone')->label('Phone') ?>
<?= $form->field($model, 'password')->passwordInput()->label('password') ?>
    <div class="form-group">
        <div>
            <?= Html::submitButton('Регистрация', ['class' => 'btn btn-success']) ?>
        </div>
    </div>
<?php ActiveForm::end() ?>