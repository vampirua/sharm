<?php

use yii\helpers\Html;

?>

<div class="container_index">

    <div>
        <?= Html::a(Html::img($model->photo_product, ['class' => 'photo_product']), "/site/main?id=$model->id") ?>
    </div>

    <div>
        <span>Цена</span>
        <span> <?= Html::encode($model->price) ?></span>

    </div>
    <div>
        <span>Производитель</span>
        <span><?= Html::encode($model->vendor_id) ?></span>

    </div>
    <div class="content_variant">
        <div class="more">
            <?= Html::a('Подробние', "/site/main?id=$model->id", ['class' => 'btn-more']) ?>
        </div>
    </div>


</div>
