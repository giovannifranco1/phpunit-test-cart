<?php

namespace tests;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use src\Email;

class EmailTest extends TestCase
{
  public function test_validate_type_instance(): void
  {
    $this->assertEquals(
      'lucas@gmail.com',
      Email::returnInstance('lucas@gmail.com')
    );
  }

  public function test_return_exception_is_email_for_invalid(): void
  {
    $this->expectException(InvalidArgumentException::class);
    Email::returnInstance('email_invalido.com');
  }
}
