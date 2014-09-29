<?php

class Trainning_Binhnh_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction ()
    {
        $this->loadLayout(array("default"));
        $this->renderLayout();
    }
    public function customersAction()
    {
        $this->loadLayout(array("default"));
        $this->renderLayout();
        $quote = Mage::getSingleton('checkout/session')->getQuote();
        $cartItems = $quote->getAllVisibleItems();
        foreach($cartItems as $item) {
            echo 'ID: '.$item->getProductId().'<br />';
            echo 'Name: '.$item->getName().'<br />';
            echo 'Sku: '.$item->getSku().'<br />';
            echo 'Quantity: '.$item->getQty().'<br />';
            echo 'Price: '.$item->getPrice().'<br />';
            echo "<br />";
        }
    }
    public function lalaAction()
    {
        $this->loadLayout(array("default"));
        $this->renderLayout();
    }
}