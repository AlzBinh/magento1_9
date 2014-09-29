<?php
/**
 * Created by PhpStorm.
 * User: zmerrychristmas
 * Date: 9/28/14
 * Time: 10:32 PM
 */

class Alanstormdotcom_Weblog_Model_Blogpost extends Mage_Core_Model_Abstract
{
    protected function _construct()
    {
        $this->_init('weblog/blogpost');
    }
}