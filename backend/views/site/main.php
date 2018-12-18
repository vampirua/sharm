<?php

use backend\widgets\One;
use backend\assets\AppAsset;
use yii\widgets\Breadcrumbs;


AppAsset::register($this);

?>

<div class="container">
    <?php echo Breadcrumbs::widget([
        'itemTemplate' => "<li><i>{link}</i></li>\n", // template for all links
        'homeLink' => [
            'label' => 'Головна',
            'url' => '/',
        ],
        'links' => [
            [
                'label' => 'Каталог',
                'url' => ['/site/category'],
                'template' => "<li>{link}</li>\n", // template for this link only
            ],

            [
                'label' => 'Продукт',
                'url' => ['site/main', 'id' => Yii::$app->request->get('id')],
                'template' => "<li><b>{link}</b></li>\n", // template for this link only
            ],
        ],
    ]);


    echo One::widget();
    ?>
</div>







