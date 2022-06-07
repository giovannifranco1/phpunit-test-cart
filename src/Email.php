<?php

namespace src;

class Email
{
  public function __construct(
    private string $email
  ) {
    $this->validateEmail($email);
  }

  public function validateEmail(string $email): void
  {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      throw new \InvalidArgumentException('Invalid email');
    }
  }

  public static function returnInstance($email)
  {
    return new self($email);
  }

  public function __toString()
  {
    return $this->email;
  }
}
