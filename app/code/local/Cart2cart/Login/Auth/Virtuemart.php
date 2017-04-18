<?php

class Cart2cart_Login_Auth_Virtuemart extends Cart2cart_Login_Auth
{
  public function validatePasswordV1($hash, $password, $salt)
  {
    $encrypted = ($salt) ? md5($password.$salt) : md5($password);
    return $hash == $encrypted;
  }

  public function validatePasswordV2($hash, $password, $salt)
  {
    if ($salt && $this->validatePasswordV1($hash, $password, $salt)) {
      return true;
    }

    if (strpos($hash, '$P$') === 0) {
      $phpass = new Cart2cart_Login_Libs_PasswordHash(10, true);
      return $phpass->CheckPassword($password, $hash);
    } elseif ($hash[0] == '$') {
      return $this->passwordVerify($password, $hash);
    } elseif (substr($hash, 0, 8) == '{SHA256}') {
      $parts     = explode(':', $hash);
      $crypt     = $parts[0];
      $salt      = @$parts[1];

      $encrypted = ($salt) ? hash('sha256', $password . $salt) . ':' . $salt : hash('sha256', $password);
      $testcrypt = '{SHA256}' . $encrypted;

      return $this->_timingSafeCompare($hash, $testcrypt);
    }

    $parts = explode(':', $hash);
    $crypt = $parts[0];
    $salt  = @$parts[1];

    $testcrypt = md5($password . $salt) . ($salt ? ':' . $salt : (strpos($hash, ':') !== false ? ':' : ''));

    return $this->_timingSafeCompare($hash, $testcrypt);
  }

  private function passwordVerify($password, $hash)
  {
    if (!function_exists('crypt')) {
      return false;
    }

    $ret = crypt($password, $hash);
    if (!is_string($ret) || $this->_strlen($ret) != $this->_strlen($hash) || $this->_strlen($ret) <= 13) {
      return false;
    }

    $status = 0;
    for ($i = 0; $i < $this->_strlen($ret); $i++) {
      $status |= (ord($ret[$i]) ^ ord($hash[$i]));
    }

    return $status === 0;
  }

  private function _strlen($string) {
    if (function_exists('mb_strlen')) {
      return mb_strlen($string, '8bit');
    }
    return strlen($string);
  }

  private function _timingSafeCompare($known, $unknown)
  {
    $known .= chr(0);
    $unknown .= chr(0);

    $knownLength = strlen($known);
    $unknownLength = strlen($unknown);

    $result = $knownLength - $unknownLength;

    for ($i = 0; $i < $unknownLength; $i++) {
      $result |= (ord($known[$i % $knownLength]) ^ ord($unknown[$i]));
    }

    return $result === 0;
  }
}