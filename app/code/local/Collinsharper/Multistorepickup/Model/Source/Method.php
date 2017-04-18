<?php
class Collinsharper_Multistorepickup_Model_Source_Method
{
    public function toOptionArray()
    {
        $shipmeth = Mage::getSingleton('Collinsharper_Multistorepickup_Model_Carrier_ShippingMethod');
        $arr = array();
        foreach ($shipmeth->getMethod() as $v)
		{
            $arr[] = array('value'=>$v, 'label'=>$v);
        }
        return $arr;
    }
}