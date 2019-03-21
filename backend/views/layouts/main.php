<?php

/*
 * @var $this \yii\web\View
 * @var $content string
 * @var $itemCount \yz\shoppingcart\ShoppingCart
 */

use backend\assets\AppAsset;
use backend\widgets\cartinfo;
use yii\helpers\Html;
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
    <div class="container">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <?= Html::a('Sharm', '/', ['class' => 'navbar-brand']) ?>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">

                        <li>
                            <?= Html::a('Каталог', '/site/category') ?>
                        </li>
                        <li>
                            <a href="/cart">
                                <?= cartinfo::widget() ?>
                            </a>
                        </li>
                        <li>
                        </li>

                    </ul>


                    <div class="form-group ">
                        <?php
                        echo Html::beginForm('search', 'get', ['class' => 'navbar-form navbar-right']);
                        echo Html::textInput('text');
                        echo Html::submitButton('Search', ['class' => 'btn btn-default']);
                        echo Html::endForm()
                        ?>
                        <ul class="nav navbar-nav navbar-right">

                            <?php if (Yii::$app->user->isGuest): ?>
                                <li><?= Html::a('Увійти', '/site/login') ?></li>
                                <li> <?= Html::a('Зареєструватися   ', '/site/singup') ?></li>
                            <?php else: ?>

                                <li class="dropdown">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                       aria-haspopup="true" aria-expanded="false">

                                        <?= Yii::$app->user->getIdentity()->email ?>

                                        <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><?= Html::a('Профіль', '/account') ?></li>
                                        <li><?= Html::a('Улюблене', '/account/favorite') ?></li>
                                        <li><?= Html::a('Корзина', '/cart') ?></li>
                                        <li><?= Html::a('Замовлення', '/account/order') ?></li>
                                        <li role="separator" class="divider"></li>
                                        <li><?= Html::a('Вийти', '/site/logout') ?></li>
                                    </ul>
                                </li>

                            <?php endif ?>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
        </nav>
    </div>


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
