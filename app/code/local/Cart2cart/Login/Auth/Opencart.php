<?php

class Cart2cart_Login_Auth_Opencart extends Cart2cart_Login_Auth
{
  public function validatePassword($hash, $password, $salt)
  {
    return ((md5($password) == $hash) || (sha1($salt . sha1($salt . sha1($password))) == $hash));
  }
}