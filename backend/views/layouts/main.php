<?php

/*
 * @var $this \yii\web\View
 * @var $content string
 * @var $itemCount \yz\shoppingcart\ShoppingCart
 */

use backend\assets\AppAsset;
use backend\widgets\cartinfo;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;


AppAsset::register($this);
$items = \Yii::$app->cart->getPositions();
$itemsCount = \Yii::$app->cart->getCount();
?>
<?php $this->beginPage();


?>


<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Sharm',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse ',
        ],
    ]);


    $menuItems = [
        ['label' => 'Каталог', 'url' => ['/site/category']],

        ['label' =>  cartinfo::widget(), 'url' => ['/cart']]];


    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Login or Register', 'url' => ['/site/login']];
    } else {
        $menuItems[] =

            [
                'label' => 'Мій профіль',
                'items' => [
                    ['label' => 'Профіль', 'url' => '/account'],
                    ['label' => 'Улюблене', 'url' => '/account/favorite'],
                    ['label' => 'Корзина', 'url' => '/cart'],
                    ['label' => 'Замовлення', 'url' => '/account/order'],
                    ['label' => 'Вийти з профіля', 'url' => 'site/logout'],
                ],
            ];
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]);
    NavBar::end();
    ?>


    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>

    </div>

    <?= $content ?>
</div>

<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12">
                <h5>CONTACT</h5>
                <div class="">
                    <p>Украина Хмельницкая область Хмельницкий ул. Геологов 729000</p>
                </div>
                <div class="">
                    <p>Telephone : +38067162-09-88 Людмила, продавец (ул. Геологов 7)</p>

                    <p>Telephone : +38096632-93-39 Максим</p>
                </div>
                <div class="">
                    <p>
                        Email : <a href="">kalina-opt@ukr.net</a>
                    </p>
                    <p> Web : <a href="">https://kalina-style.com.ua</a></p>
                </div>

            </div>
            <div class="col-md-3 col-sm-3 col-xs-12">
                <h5>Company</h5>
                <ul>
                    <li><a href="/">Home</a></li>
                    <li><a href="/site/about">About us</a></li>
                    <li><a href="">Contact us</a></li>
                    <li><a href="">Privat policy</a></li>
                </ul>
            </div>
            <div class="col-md-3 hidden-sm col-xs-12">

                <h5>SUPPORT</h5>
                <ul>
                    <li><a href="">Delivery information</a></li>
                    <li><a href="">Order tracking</a></li>
                    <li><a href="">Return product</a></li>
                    <li><a href="">Gift card</a></li>
                    <li><a href="">Home delivery</a></li>
                    <li><a href="">Online support</a></li>
                </ul>
            </div>
            <div class="col-md-2 col-sm-3 col-xs-12">
                <h5>INFORMATION</h5>
                <ul>
                    <li><a href="">Payment option</a></li>
                    <li><a href="">Shipping</a></li>
                    <li><a href="">Checkout</a></li>
                    <li><a href="">Discount</a></li>
                    <li><a href="">Sitemap</a></li>
                    <li><a href="">Service</a></li>
                </ul>
            </div>

        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
