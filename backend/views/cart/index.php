<?php

use \yii\bootstrap\Html;
use backend\assets\AppAsset;
use yii\web\View;
use yz\shoppingcart\CartPositionInterface;
use \yii\helpers\Url;

/**
 * @var $this View
 * @var $mobile boolean
 * @var $items Variant[]| CartPositionInterface
 * @var $cart \yz\shoppingcart\ShoppingCart
 */


AppAsset::register($this);

$script = <<<JS
jQuery();
 var body = jQuery('body');
   var cart = jQuery('.wrap_cart');

    function updateCart(html) {
        var newHtml = jQuery(html);
        cart.html(newHtml.html());
       
 }
  body.on('click', '.btn-remove', function () {
        var current = jQuery(this);
        var productId = current.data('product-id');
        jQuery.ajax({
            url: '/cart/remove',
            data: {
                id: productId
            },
            success: function (data) {
                updateCart(data);
            }
        });
    });
 
JS;
$this->registerJs($script, yii\web\View::POS_READY);



?>
<div class="row wrap_cart">

    <div class="row">


        <?php
        foreach ($items as $item) {
            ?>
            <div class="col-lg-12">
                <div class="col-lg-2">
                    <div class="img-cart">
                        <?= Html::a(Html::img($item->variant_photo, ['class' => 'photo_product']), "/site/main?id=$model->id") ?>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div>
                        <p>Цена</p>
                        <?= Html::encode($item->price); ?>
                    </div>
                </div>

                <div class="col-lg-1">
                    <div class="count_cart">

                        <label for="count">Кіл.</label>

                        <?= Html::button('+', '') ?>
                            <?= Html::input('text', 'quantity', "$item->quantity") ?>
                        <?= Html::button('-', '') ?>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div class="comment_cart">
                        <label for="comment">Комент.</label>
                        <textarea title="comment" name="comment">

                            </textarea>
                    </div>
                </div>
                <div class="col-lg-2">
                    <div>
                        <?= Html::button('hi', ['class' => 'btn-remove', 'data-product-id' => $item->id]) ?>
                        <?= Html::a('Remove All', Url::to(["/cart/clear"])) ?>
                    </div>
                </div>
            </div>
            <?php
        }


        ?>
        <?= Html::a('order', '/cart/save'); ?>

    </div>
</div>