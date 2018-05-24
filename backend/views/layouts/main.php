<?php

/* @var $this \yii\web\View */

/* @var $content string
 */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;


AppAsset::register($this);
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

        ['label' => "Корзина ()", 'url' => ['/cart']]];


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

    <div class="col-xs-10 col-lg-offset-1">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="header-logo">
                    <a href="/">
                        <img src="/uploads/1.png" alt="">
                    </a>
                </div>
            </div>
            <div class="col-md-3 hidden-sm hidden-xs">
                <div class="info">
                    <h4>+012 345 678 102</h4>
                    <p>We are open 9 am - 10pm</p>
                </div>
            </div>
            <div class="col-md-3 hidden-sm hidden-xs">
                <h4>info@example.com</h4>
                <p>You can mail us</p>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="search-header">
                    <img src="uploads/search.png" alt="">
                </div>
            </div>
        </div>
    </div>


    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12">
                <h5>CONTACT</h5>
                <div class="">
                    <p>8901 Marmora Raod, </p>
                </div>
                <div class="">
                    <p>Telephone : +012 345 678 102</p>

                    <p>Telephone : +123456789</p>
                </div>
                <div class="">
                    <p>
                        Email : <a href="">info@example.com</a>
                    </p>
                    <p> Web : <a href="">www.example.com</a></p>
                </div>

            </div>
            <div class="col-md-3 col-sm-3 col-xs-12">
                <h5>Company</h5>
                <ul>
                    <li><a href="">Home</a></li>
                    <li><a href="">About us</a></li>
                    <li><a href="">Contact us</a></li>
                    <li><a href="">Our blog</a></li>
                    <li><a href="">Support center</a></li>
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
