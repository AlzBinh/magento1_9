<?php
/**
 * Created by PhpStorm.
 * User: zmerrychristmas
 * Date: 10/2/14
 * Time: 4:28 PM
 */
class Fr06_Vendoreav_Model_Customer_Observer
{
    public static  $_customer;
    public static  $_controller;
    public function  registerModel($observer)
    {
        echo '<pre>';
        $url = Mage::getBaseUrl() . 'fr06-vendoreav/index/test';
        self::$_controller = clone $observer['account_controller'];
        self::$_customer = clone $observer->getCustomer();
        //var_dump(self::$_customer);
        //Mage::register('my_customer',clone self::$_customer);
        Mage::getSingleton('core/session')->setData('my_customers', self::$_customer);
        Mage::app()->getResponse()->setRedirect($url)->sendResponse();
        die();
        //die();
        //$_SESSION['customer'] = $observer->getEvent()->getCustomer();
        //var_export($customer);
        //Mage::getModel('core/session')->setData('customer', $customer);
//        echo $url;
//        Mage::register('gt', $url);
//        echo Mage::registry('gt');
//        die();
        //Mage::getSingleton('core/session')->setData('laola','ha ha ha');
//        Mage::app()->getResponse()->setRedirect($url)->sendResponse();

//        var_dump($customer);
       // die();
    }
}