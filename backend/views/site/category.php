<?php

use backend\assets\AppAsset;
use yii\data\ActiveDataProvider;
use yii\widgets\ListView;
use yii\widgets\Pjax;

/**
 * @var $searchModel \app\models\CatalogSearch
 * @var $dataProvider ActiveDataProvider
 * @var $filters array
 *
 */

AppAsset::register($this);


?>
<div class="category-wrap">
    <div class="row">
        <div class="col-xs-3">
            <?= $this->render('_search', ['model' => $searchModel]); ?>
        </div>
        <div class="col-xs-9">
            <?php Pjax::begin(); ?>

            <?= ListView::widget([
                'dataProvider' => $dataProvider,
                'itemView' => '_list',
                'itemOptions' => [
                    'tag' => 'div',
                    'class' => 'col-md-4 col-xs-10',
                ]
            ]); ?>
            <?php Pjax::end(); ?>
        </div>
    </div>


</div>
