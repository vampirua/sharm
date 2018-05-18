<?php
/**
 * Created by PhpStorm.
 * User: Dimon
 * Date: 05.12.2017
 * Time: 14:52
 */

namespace backend\widgets;

use app\models\Product;
use backend\modules\catalog\models\Variant;
use yii\bootstrap\Widget;;


/**
 * @var $model Product
 * @var $variant Variant
 */
class Size extends Widget
{
    public $size;

    public function run()
    {

        return $this->render('new', [
            'size' => $this->size
        ]);

    }
}

