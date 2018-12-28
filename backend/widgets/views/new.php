<?php


use backend\assets\AppAsset;
use yii\helpers\Html;

/**
 *   * @var $size \backend\modules\catalog\models\Variant
 * @var $isGeneral boolean
 */


AppAsset::register($this)
?>
<div>
    <?php foreach ($size as $variant) : ?>
        <?= Html::radio('size', 'true', ['id' => 'variant-' . $variant->id, 'value' => $variant->size, 'class' => 'check-size']) ?>
        <?= Html::label(
            $variant->size,
            'variant-' . $variant->id
        ) ?>
    <?php endforeach; ?>
</div>
E