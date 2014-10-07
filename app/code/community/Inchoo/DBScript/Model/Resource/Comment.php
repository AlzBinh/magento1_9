<?php
/**
 * Created by PhpStorm.
 * User: zmerrychristmas
 * Date: 10/1/14
 * Time: 11:42 PM
 */
class Inchoo_DBScript_Model_Resource_Comment extends Mage_Core_Model_Resource_Db_Abstract
{
    public function _construct()
    {
        $this->_init('inchoo_dbscript/comment','comment_id');
    }
}