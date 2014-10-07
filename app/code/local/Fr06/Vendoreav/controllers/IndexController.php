<?php
/**
 * Created by PhpStorm.
 * User: zmerrychristmas
 * Date: 10/1/14
 * Time: 4:11 PM
 */
class Fr06_Vendoreav_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
//        echo 'hahaha';
//        $tableName = Mage::getSingleton('core/resource')->getTableName('fr06_vendoreav/vendorer');
//        echo $tableName;
//        $model = Mage::getModel('catalog/product',c);
//        echo get_class($model);
//        error_reporting(E_ALL | E_STRICT);

//        require_once './app/Mage.php';
//        umask(0);
////        Mage::app();
//
//        $attr = 'vendor_email'; //attribute code to remove
//
//        $setup = Mage::getResourceModel('customer/setup', 'core_setup');
//    try {
//        $setup->startSetup();
//        $setup->removeAttribute('customer', 'vendor_name');
//        $setup->removeAttribute('customer', 'customer_level');
//        $setup->removeAttribute('customer', 'vendor_logo');
//        $setup->removeAttribute('customer', 'vendor_paypal');
//        $setup->endSetup();
//        echo $attr . "vendor_paypal attribute is removed";
//    } catch (Mage_Core_Exception $e) {
//        print_r($e->getMessage());
//    }
        $this->loadLayout(array('default'));
        $this->renderLayout();
    }
    public function testAction()
    {
        echo 'you are here , i will check all parameter you through';
        //$url = Mage::getBaseUrl() . 'customer/account/index/';
        //Mage::app()->getResponse()->setRedirect($url)->sendResponse();
//        $customer = Mage::getModel('customer/session')->getCustomer();
//        $data = $customer->getData();
//        var_dump($data);
        $customer = Mage::getSingleton('core/session')->getData('my_customers');
        var_dump($customer);
        die();
        $this->loadLayout(array('default'));
        $this->renderLayout();
    }
}