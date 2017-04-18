<?php

class Cart2cart_Login_Auth_PrestaShop extends Cart2cart_Login_Auth
{
  public function validatePassword($hash, $password, $salt)
  {
    return (md5($salt . $password) == $hash) || (md5($password) == $hash);
  }
}