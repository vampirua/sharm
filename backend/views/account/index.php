<?php

use backend\assets\AppAsset;
use yii\web\View;
use yii\helpers\Html;

/**
 * @var $this View
 *
 */


?>
<div class="row">
    <div class="col-sm-3 col-xs-12">
        <div class="row">
            <div class="col-xs-12">
                Мій кабінет
            </div>
            <div class="col-xs-12">
                <?= Html::a('Особисті дані', '/account') ?>
            </div>
            <div class="col-xs-12">
                <?= Html::a('Список бажань', '/account/favorite') ?>
            </div>
            <div class="col-xs-12">
                <?= Html::a('Кошик', '/cart') ?>
            </div>
            <div class="col-xs-12">
                <?= Html::a('Мої замовлення', '/account/order') ?>
            </div>

        </div>
    </div>
    <div class="col-sm-9">
        <div class="account-content">
            <div class="col-xs-12">
                <span>Ім'я</span>
                <span><?= $model->username ?></span>
            </div>

            <div class="col-xs-12">
                <span>Телефон</span>
                <span><?= $model->phone ?></span>
            </div>
            <div class="col-xs-12">
                <span>Електрона адреса</span>
                <span><?= $model->email ?></span>
            </div>
            <div class="col-xs-12">
                <span>Адресса для доставки</span>
                <span></span>
            </div>
        </div>
    </div>
</div>
