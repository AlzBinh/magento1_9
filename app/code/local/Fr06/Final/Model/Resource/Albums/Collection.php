<?php
/**
 * Created by PhpStorm.
 * User: zmerrychristmas
 * Date: 10/3/14
 * Time: 3:13 PM
 */
class Fr06_Final_Model_Resource_Albums_Collection extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    public function _construct()
    {
        $this->_init('fr06_final/albums');
    }
}