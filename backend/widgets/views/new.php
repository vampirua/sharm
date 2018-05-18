<?php


use backend\assets\AppAsset;
use yii\helpers\Html;

/**
 *   * @var $size \app\models\Variant
 * @var $isGeneral boolean
 */


AppAsset::register($this)
?>
<div>
    <?php foreach ($size as $variant) : ?>
        <?= Html::radio('size', 'true', ['value' => $variant->size,'label' => $variant->size]) ?>
    <?php endforeach; ?>
</div>
