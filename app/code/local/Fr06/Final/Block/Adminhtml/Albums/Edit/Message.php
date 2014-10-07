<?php
/**
 * Created by PhpStorm.
 * User: zmerrychristmas
 * Date: 10/5/14
 * Time: 11:25 PM
 */
class Fr06_Final_Block_Adminhtml_Albums_Edit_Message extends Mage_Adminhtml_Block_Abstract
{
    protected $_sucess;
    protected $_errors;
    protected $_notification;
    public function __construct()
    {
        $session = Mage::core('core/session');
    }
}