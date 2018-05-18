<?php

use yii\helpers\Html;



$script = <<<JS
jQuery();
jQuery(".owl-carousel-tabs").owlCarousel({
 items:3,
 nav:true,
 dots:false
 }
 );

JS;
$this->registerJs($script, yii\web\View::POS_READY);


?>


<div class="row">
    <div class="col-xs-12">
        <div  class="owl-carousel owl-carousel-tabs">
            <?php foreach ($model as $items => $item): ?>

                <div class="item container_index">

                    <div class="img-product">
                        <?= Html::a(Html::img($item->photo_product, ['class' => 'photo_product']), "/site/main?id=$item->id") ?>
                    </div>

                    <div>
                        <span>Цена</span>
                        <span> <?= Html::encode($item->price) ?></span>

                    </div>
                    <div>
                        <span>Производитель</span>
                        <span><?= Html::encode($item->vendor_id) ?></span>

                    </div>
                    <div class="content_variant">
                        <div class="more">
                            <?= Html::a('Подробние', "/site/main?id=$item->id", ['class' => 'btn-more']) ?>
                        </div>
                    </div>


                </div>

            <?php endforeach; ?>
        </div>
    </div>
</div>
