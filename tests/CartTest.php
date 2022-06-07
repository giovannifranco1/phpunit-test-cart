<?php

namespace tests;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use src\Cart;

class CartTest extends TestCase
{
  public function test_add_item_to_cart()
  {
    $cart = new Cart();
    $cart->addItem('Coca');
    $cart->addItem('Bolacha');
    $cart->addItem('Chocolate');
    $cart->addQtd('Bolacha', 5);
    $this->assertEquals('Coca (1), Bolacha (5), Chocolate (1)', $cart);
  }

  public function test_return_exception_is_cart_for_invalid()
  {
    $this->expectException(InvalidArgumentException::class);
    $cart = new Cart();
    $cart->addItem('Coca');
    $cart->addItem('Bolacha');
    $cart->addItem('Chocolate');
    $cart->addItem('Coca');
    $cart->addQtd('coca', 10);
  }

}
