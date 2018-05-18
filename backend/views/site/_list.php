<?php
/**
 * Created by PhpStorm.
 * User: Dimon
 * Date: 14.05.2018
 * Time: 13:53
 */

use yii\helpers\Html;
/* @var $this yii\web\View */
/* @var $model app\models\Product */
?>

  <div class="item container_index">

                    <div class="img-product">
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