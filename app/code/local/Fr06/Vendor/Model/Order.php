<?php
/**
 * Created by PhpStorm.
 * User: zmerrychristmas
 * Date: 9/29/14
 * Time: 9:24 AM
 */
class  Fr06_Vendor_Model_Order extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        $this->_init('vendor/order');
    }
    public function getTextDemo()
    {
        echo 'a';
    }
}