<?php


use backend\modules\color\models\Color;
use backend\widgets\RelatedSlider;
use yii\helpers\Html;
use yii\web\View;
use backend\modules\product\models\Product;

/**
 * @var $this View
 *  * @var $model Product
 *   * @var $colors Color
 * *@var $vendor \backend\modules\vendor\models\Vendor
 * @var $size \backend\modules\catalog\models\Variant
 * @var $isGeneral boolean
 */


$script = <<<JS
jQuery();

     var body = jQuery('body');
     var size = jQuery('#variant-size');
     var quantity = jQuery('#quantity');
     var current = jQuery('.check-color');
     var productId = current.data('product-id');
     var variantColor = current.data('variant-color');


     function variantSize(html) {
        var newHtml = jQuery(html);
        size.html(newHtml.html());
       }
        //check for empty 
   
       if (!(jQuery(variantColor).is(':empty'))){
  jQuery.ajax({
            url: '/site/check',
            data: {
                id: productId,
                color:variantColor
            },
            success: function (data) {
                variantSize(data);
              
            }
        });
}
       
       
       
       
       body.on('click', '.check-color', function () {
  
       
        var current = jQuery(this);
        var productId = current.data('product-id');
        var variantColor = current.data('variant-color');
    
        jQuery.ajax({
            url: '/site/check',
            data: {
                id: productId,
                color:variantColor
            },
            success: function (data) {
                variantSize(data);
              
            }
        });
    });
       body.on('click','.check-color',function() {
           jQuery('#variant-color').find("p").remove()
      });
       
       body.on('click','#plus',function() {
       var input = quantity.find("input");
       var inputCount = input.val();
       inputCount++;
       input.val(inputCount);
      });
       body.on('click','#minus',function() {
        var input = quantity.find("input");
        var current = jQuery(this);
        var quantityProduct = current.data('quantity-product');
      
    
       var inputCount = input.val();
       if(inputCount<=quantityProduct){
           return false
       }else{
            input.val(inputCount-1);        
       }
      
      });
       
       
       
       body.on('click','.btn-cart',function() {
     var color = document.getElementsByName("color");
      var size = document.getElementsByName("size");
      var hint = document.createElement("p");
      var hintText = document.createTextNode("Choise color");
      hint.appendChild(hintText);
 for(var i=0;i<color.length;i++) {
     if(color[i].checked === false){
         if(color[i]=== color[color.length-1]){
     
             jQuery('#variant-color').append(hint);
             return false;
         }
   
     }else{
     
         break;
       
     }
 }


    
  });
 
     
JS;
$this->registerJs($script, yii\web\View::POS_READY);
?>

<div class="site-index">
    <div class="main-wrap">

        <div class="product-index">
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                    <div>
                        <?= Html::a(Html::img($model->photo_product, ['class' => 'product_img'])) ?>
                    </div>
                </div>
                <div class="col-lg-7 col-md-7 col-sm-12 col-xs-12">
                    <div class="product_detail">

                        <div class="product_title">
                            <h2>
                                <?= Html::encode($model->name) ?>
                            </h2>
                        </div>
                        <div class="product_price">
                            <h4>
                                <strong>&#8372;<?= Html::encode($model->price); ?></strong>
                            </h4>
                            <!--<del>180</del>-->

                        </div>
                        <h5>
                            Товар: <span>в наявності</span>
                        </h5>
                        <div class="prdoduct_vendor">
                            <h2>
                                Виробник : <?= Html::encode($vendor->country) ?>
                            </h2>
                        </div>
                        <p class="detail">
                            <?= Html::encode($model->description) ?>
                        </p>
                        <div class="content_variant">

                            <h2>Варіант</h2>

                            <?= Html::beginForm('/cart/add', 'post') ?>
                            <div class="row">
                                <div class="col-xs-10 " id="quantity">
                                    <span> Мінімальна сума заказу <?= $model->min_quantity ?></span>
                                    <?= Html::button('+', ['id' => 'plus']); ?>
                                    <?= Html::input('text', 'quantity', "$model->min_quantity"); ?>
                                    <?= Html::button('-', ['id' => 'minus', 'data-quantity-product' => $model->min_quantity]); ?>
                                </div>
                            </div>

<!--                            <div class="">-->
<!--                                <h4>Виберіть колір і розмір : </h4>-->
<!--                                --><?php //foreach ($colors as $color) : ?>
<!--                                    <div class="one_variant">-->
<!---->
<!--                                        <div id="variant-color">-->
<!--                                            --><?//= Html::radio(
//                                                'color',
//                                                'true',
//                                                [
//                                                    'id' => 'color-' . $color->id,
//                                                    'value' => $color->id,
//                                                    'class' => 'check-color',
//                                                    'data-product-id' => $model->id,
//                                                    'data-variant-color' => $color->id
//                                                ]
//                                            ) ?>
<!--                                            --><?//= Html::label(
//                                                    '',
//                                                'color-' . $color->id,
//                                                ['style' => "background : $color->color "]
//                                            ) ?>
<!--                                        </div>-->
<!--                                        <div id="variant-size"></div>-->
<!--                                    </div>-->
<!--                                --><?php //endforeach; ?>
<!--                            </div>-->
                            <?= Html::input('hidden', 'product-id', $model->id) ?>
                            <div class="form-group">
                                <?= Html::submitButton('Buy', ['class' => 'btn-cart']) ?>
                            </div>
                            <?= Html::endForm() ?>
                        </div>
                    </div>


                </div>
            </div>

        </div>


        <div class="related">
            <div class="link_relation">
                <?= Html::a('RELATED PRODUCT', '/site/category', ['class' => 'link_relation']) ?>
            </div>
            <div>

                <?php echo RelatedSlider::widget(['category' => $model->category_id]); ?>
            </div>
        </div>
    </div>
</div>



