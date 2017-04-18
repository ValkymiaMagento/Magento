<?php

class Cart2cart_Login_Auth_Oscommerce extends Cart2cart_Login_Auth
{
  public function validatePassword($hash, $password)
  {
    $hasher = new Cart2cart_Login_Libs_PasswordHash(10, true);
    return $hasher->CheckPassword($password, $hash);
  }
}