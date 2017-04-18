<?php

require_once Mage::getModuleDir('controllers', 'Mage_Customer') . '/AccountController.php';

class Cart2cart_Login_AccountController extends Mage_Customer_AccountController
{
  public function loginPostAction()
  {
    if (!$this->_validateFormKey()) {
      $this->_redirect('*/*/');
      return;
    }

    if ($this->_getSession()->isLoggedIn()) {
      $this->_redirect('*/*/');
      return;
    }

    if ($this->getRequest()->isPost()) {

      $session = $this->_getSession();
      $login = $this->getRequest()->getPost('login');

      if (!empty($login['username']) && !empty($login['password'])) {

        $customer = $session->getCustomer()->loadByEmail($login['username']);

        try {

          if (!$customer->getEmail() || !$validateMethod = $customer->getPwdValidateMethod()) {
            throw new Exception($this->__('Use Magento authentication for this customer'));
          }

          list($store, $version) = explode('_', $validateMethod);

          if ($version == 'Ambient') {
            $version = '';
          }

          $auth = new Cart2cart_Login_Auth();
          $auth->customValidateHash($store, $version, $customer->getPasswordHash(), $login['password'], $customer->getPasswordSalt());

          $customer->setPassword($login['password'])
            ->setPwdValidateMethod('')
            ->save();

          $session->setCustomerAsLoggedIn($customer);
        } catch(Exception $e) {
          parent::loginPostAction();
          return;
        }
      } else {
        $session->addError($this->__('Login and password are required'));
      }
    }

    $this->_loginPostRedirect();
  }
}