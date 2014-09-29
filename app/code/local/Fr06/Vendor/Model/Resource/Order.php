<?php
/**
 * Created by PhpStorm.
 * User: zmerrychristmas
 * Date: 9/29/14
 * Time: 10:08 AM
 */
class Fr06_Vendor_Model_Resource_Order extends Mage_Core_Model_Resource_Db_Abstract
{
    public function _construct()
    {
        $this->_init('vendor/order','vendor_id');

    }
}