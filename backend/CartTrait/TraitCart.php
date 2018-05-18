<?php

namespace backend\CartTrait;
use yz\shoppingcart\ShoppingCart;


/**
 * Created by PhpStorm.
 * User: Dimon
 * Date: 22.12.2017
 * Time: 12:23
 */
trait TraitCart
{
    /*
    * @var ShoppingCart
    */
    protected $_cart;

    /*
    * @return ShoppingCart
    */

    public function getCart()
    {
        if (!isset($this->_cart)) {
            $this->_cart = new ShoppingCart();
        }
        return $this->_cart;
    }
}