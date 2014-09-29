<?php
/**
 * Created by PhpStorm.
 * User: zmerrychristmas
 * Date: 9/29/14
 * Time: 5:10 AM
 */
class Alanstormdotcom_Weblog_Model_Mysql4_Blogpost extends Mage_Core_Model_Mysql4_Abstract
{
    public function _construct()
    {
        //parent::_construct();
        $this->_init('weblog/blogpost','blogspot_id');
    }
}