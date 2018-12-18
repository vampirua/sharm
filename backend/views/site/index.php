<?php


use backend\assets\AppAsset;
use backend\models\ContactForm;
use backend\widgets\SliderNewProducts;
use yii\bootstrap\Tabs;
use backend\widgets\Slider;
use yii\helpers\Html;


/* @var $model ContactForm
 * @var $this yii\web\View
 */
/* @var $searchModel backend\modules\product\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$this->title = 'My Yii Application';
AppAsset::register($this);


$script = <<<JS
jQuery();
 jQuery(".main-slider").owlCarousel({
 items :1,
 nav:true
 }
 );

JS;
$this->registerJs($script, yii\web\View::POS_READY);
?>


<div class="row main_bootstrap">
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
        </div>
    </div>
    <div class="col-xs-12">
        <div class="owl-carousel main-slider">

            <div class="item">
                <div class="container">
                    <a href=""> <img src="/uploads/slide-1.jpg" alt=""></a>
                </div>
            </div>
            <div class="item">
                <div class="container">
                    <a href="#">
                        <img src="/uploads/slide-2.jpg" alt="">
                    </a>
                </div>
            </div>
            <div class="item">
                <div class="container">
                    <a href="#">
                        <img src="/uploads/slide-3.jpg" alt="">3
                    </a>
                </div>
            </div>

        </div>
    </div>
    <div class="container">
        <div class="row collection">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="colection-bags">
                    <a href="">
                        <img src="/uploads/bags-for-man.jpg" alt="">
                    </a>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="collection-shoes">
                    <a href="">
                        <img src="/uploads/shoes-collection.jpg" alt="">
                    </a>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="collection-watch">
                    <a href="">
                        <img src="/uploads/watch.jpg" alt="">
                    </a>
                </div>
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="bags-collection">
                    <a href="">
                        <img src="/uploads/bags-for-women.jpg" alt="">
                    </a>
                </div>
            </div>
        </div>

        <?php
        echo Tabs::widget([
            'items' => [
                [
                    'label' => 'NEW ARRIVAL',
                    'content' => SliderNewProducts::widget(),

                ],
                [
                    'label' => 'FEATURED',
                    'content' => Slider::widget(),
                    'options' => ['class' => 'FEATURED'],
                    'active' => true

                ],
                [
                    'label' => 'FEATURED',
                    'content' => Slider::widget(),

                ],

            ],
            'options' => ['class' => 'main-tabs']
        ]);


        ?>


    </div>

    <div class="new_subscriber">
        <div class="container">
            <div class="row">
                <div class="sub_form">
                    <div class="col-lg-4 col-md-5 col-sm-12 col-xs-12">
                        <div class="text-left">
                            <h3>Подпишись на нас :)</h3>
                        </div>

                    </div>
                    <div class="col-lg-8 col-md-7 col-sm-12 col-xs-12">
                        <?= Html::beginForm('/site/subscriber', 'post') ?>
                        <?= Html::textInput('subscriber', '', ['placeholder' => 'Введите e-mail']) ?>
                        <?= Html::submitButton('send', ['class' => 'btn btn-primary']) ?>
                        <?= Html::endForm() ?>
                    </div>

                </div>
            </div>
        </div>

    </div>

    <div class="contact">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-sm-12 col-xs-12">
                    <div class="left">
                        <div class="logo">
                            <a href="/">
                                <img src="/uploads/1.png" alt="">
                            </a>
                        </div>
                        <p>
                            Lorem ipsum dolor sit amet, consectetur adi elit, sed do eiusmod tempor incididunt ut
                            ore dolore magna aliqua. Ut enim ad minim eniam

                            Lorem ipsum dolor sit amet, consectetur adi elit, sed do eiusmod tempor incididunt ut
                        </p>
                    </div>
                </div>
                <div class="col-md-8 col-sm-12 col-xs-12">
                    <div class="right">
                        <h2>Напишы нам</h2>
<!--                        --><?php //$form = ActiveForm::begin(['id' => 'contact-form']); ?>
<!--                        <div class="row">-->
<!--                            <div class="col-xs-6">-->
<!--                                --><?//= $form->field($model, 'name')->textInput()->label('Имя') ?>
<!---->
<!--                            </div>-->
<!--                            <div class="col-xs-6">-->
<!--                                --><?//= $form->field($model, 'email') ?>
<!--                            </div>-->
<!--                        </div>-->
<!---->
<!---->
<!--                        --><?//= $form->field($model, 'body')->textarea(['rows' => 6])->label('') ?>
<!---->
<!---->
<!--                        <div class="form-group">-->
<!--                            --><?//= Html::submitButton('Отправить', ['class' => 'btn btn-primary', 'name' => 'contact-button']) ?>
<!--                        </div>-->
<!---->
<!--                        --><?php //ActiveForm::end(); ?>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>



