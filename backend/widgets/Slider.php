<?php
/**
 * Created by PhpStorm.
 * User: Dimon
 * Date: 10.05.2018
 * Time: 12:54
 */

namespace backend\widgets;


use backend\modules\product\models\Product;
use yii\base\Widget;

class Slider extends Widget
{
    public function run()
    {

        $model = Product::find()->with('variant')->limit(10)->all();
        return $this->render('slider', [
            'model' => $model
        ]);

    }
}