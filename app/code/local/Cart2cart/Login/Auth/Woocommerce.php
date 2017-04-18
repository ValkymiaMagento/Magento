<?php

class Cart2cart_Login_Auth_Woocommerce extends Cart2cart_Login_Auth
{
  public function validatePassword($hash, $password)
  {
    if ( strlen($hash) <= 32 ) {
      return $this->hashEquals($hash, md5($password));
    }

    $hasher = new Cart2cart_Login_Libs_PasswordHash(8, true);
    return $hasher->CheckPassword($password, $hash);
  }

  private function hashEquals($a, $b) {
    $aLength = strlen($a);
    if ($aLength !== strlen($b)) {
      return false;
    }
    $result = 0;

    for ($i = 0; $i < $aLength; $i++) {
      $result |= ord($a[$i]) ^ ord($b[$i]);
    }

    return $result === 0;
  }
}