<?php


use backend\assets\AppAsset;

use backend\assets\OwlAsset;
use yii\bootstrap\Tabs;

use backend\widgets\Slider;


/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductSearch */
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


<div class="row">
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
    <div class="col-xs-12">
        <div class="owl-carousel main-slider">
            <div class="item">

                <a href=""> <img src="uploads/slide-1.jpg" alt=""></a>


            </div>
            <div class="item"><a href="#">
                    <img src="uploads/slide-2.jpg" alt="">
                </a></div>
            <div class="item"><a href="#">
                    <img src="uploads/slide-3.jpg" alt="">
                </a></div>

        </div>
    </div>
</div>
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
            'content' => Slider::widget(),

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


