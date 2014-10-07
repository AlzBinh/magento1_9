<?php
/**
 * Created by PhpStorm.
 * User: zmerrychristmas
 * Date: 10/1/14
 * Time: 11:44 PM
 */
class Inchoo_DBScript_Model_Resource_Ticket_Collection
        extends Mage_Core_Model_Resource_Db_Collection_Abstract
{
    public function _construct()
    {
        $this->_init('inchoo_dbscript/ticket');
    }
}