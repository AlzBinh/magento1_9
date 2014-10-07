<?php
/**
 * Created by PhpStorm.
 * User: zmerrychristmas
 * Date: 10/3/14
 * Time: 3:12 PM
 */
class  Fr06_Final_Model_Albums extends Mage_Core_Model_Abstract
{
    public function _construct()
    {
        $this->_init('fr06_final/albums');
    }
    public function getTextDemo()
    {
        echo 'a';
    }
}