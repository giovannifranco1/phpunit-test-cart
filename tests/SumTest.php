<?php

namespace tests;

use PHPUnit\Framework\TestCase;
use src\Sum;

class SumTest extends TestCase
{
  public function test_sum_two_numbers()
  {
    $sum = new Sum(11, 11);
    $sum->sum();
    $this->assertEquals(22, $sum->sum());
  }

  public function test_json()
  {
    $this->assertJson(json_encode(['name' => 'Giovanni']));
  }
}
