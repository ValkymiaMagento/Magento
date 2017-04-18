<?php

class Cart2cart_Login_Auth
{
  public function customValidateHash($store, $version, $hash, $password, $salt)
  {
    $className = get_class($this) . '_' . $store;
    $validator = new $className();

    if (!method_exists($validator, 'validatePassword' . $version)) {
      throw new Exception(_('Use Magento authentication for this customer'));
    }

    if (!call_user_func(array($validator, 'validatePassword' . $version), $hash, $password, (string)$salt)) {
      throw new Exception(Mage::helper('customer')->__('Invalid login or password.'));
    }
  }
}