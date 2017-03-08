<?php

/**
 * Class MMM_Cliente_Block_Navigation
 */
class MMM_Cliente_Block_Navigation extends Mage_Customer_Block_Account_Navigation
{
    /**
     * @description Metodo encargado de eliminar un link en la cuenta del usuario
     * @param $name
     */
    public function removeLinkByName($name)
    {
        unset($this->_links[$name]);
    }

}