<?php


use yii\helpers\Html;
use yii\web\View;
use app\models\Product;

/**
 * @var $this View
 *  * @var $model Product
 *   * @var $size Variant
 * @var $isGeneral boolean
 */


$script = <<<JS
jQuery();

 var body = jQuery('body');
  var size = jQuery('#variant-size');
  var quantity = jQuery('#quantity');
  

     function variantSize(html) {
        var newHtml = jQuery(html);
        size.html(newHtml.html());
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
       var inputCount = input.val();
       if(inputCount<=5){
           return false
       }else{
            input.val(inputCount-1);
       }
      
      });
       body.on('click','.btn-cart',function() {
           
           
           debugger;
       var quantity = body.find("quantity").val();
           if(quantity<=5){
             return false;
           }
           
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

                    <div>
                        <p>Цена</p>
                        <?= Html::encode($model->price); ?>

                    </div>
                    <div>
                        <p>Производитель</p>
                        <?= Html::encode($model->vendor_id); ?>
                    </div>
                    <div class="content_variant">

                        <h2>Варіант</h2>

                        <?= Html::beginForm('/cart/add', 'post') ?>
                        <div class="row">
                            <div class="col-xs-10 " id="quantity">
                                <span> Мінімальна сума заказу <?= $size->quantity ?></span>
                                <?= Html::button('+', ['id' => 'plus']); ?>
                                <?= Html::input('text', 'quantity', "5"); ?>
                                <?= Html::button('-', ['id' => 'minus']); ?>


                            </div>
                        </div>

                        <?php foreach ($model->variant as $variant) : ?>
                            <div class="one_variant">
                                <div id="variant-color">
                                    <?= Html::radio('color', '', ['value' => $variant->color, 'class' => 'check-color', 'label' => $variant->color, 'data-product-id' => $variant->product_id, 'data-variant-color' => $variant->color]) ?>
                                </div>
                                <div id="variant-size">

                                </div>
                            </div>
                        <?php endforeach; ?>

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
</div>



