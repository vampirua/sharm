<?php
/**
 * Created by PhpStorm.
 * User: Dimon
 * Date: 01.06.2018
 * Time: 10:33
 */

namespace backend\widgets;


use backend\CartTrait\TraitCart;
use yii\base\Widget;

class cartinfo extends Widget
{
    use TraitCart;

    public function run()
    {
        $count = $this->cart->getCount();
        return $this->render('cartinfo', [
            'count' => $count
        ]);
    }

}