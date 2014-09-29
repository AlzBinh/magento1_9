<?php
/**
 * Created by PhpStorm.
 * User: zmerrychristmas
 * Date: 9/21/14
 * Time: 9:36 AM
 */
class Fr06_Catalogs_Model_Config_Observer
{
    public function storeAttributes($observer)
    {
            echo 'ha ha';
        $collection = $observer->getCollection();
//        if ($collection  instanceof Mage_Catalog_Model_Resource_Product_Type_Configurable_Product_Collection)
//        {
//            $storageModel = Mage::getSingleton('fr06_catalogs/storage');
//            $storageModel->storeData($collection);
//        }
        foreach ($collection as $p)
        {
           // echo '<hr /><pre>';
            $p->setFinalPrice(2118000);
            $p->setMiniPrice(2118000);
            $p->setMinimalPrice(2118000);
            //$pro = $p->getProduct();
           // var_export ($pro);
        }
        //var_dump($event);
       // die();
        return $this;
    }
    public function changeProductPrice($observer)
    {
        $event = $observer->getEvent();
        $product = $event->getProduct();
        if ($product )
        {
            if ($product->getPrice() != NULL)
            {
                $price = $product->getPrice();
                $price = floor($price * 125 / 100);
                $product->setPrice($price);
            }
        }
        return $this;
    }
    public function changePriceWhenAddCart($observer)
    {
//        $event = $observer->getEvent();
//        $product = $event->getQuoteItem();
        echo '<pre>';
////        var_export($observer);
////        die();
//          var_export($observer->getEvent()->getRequest()->getQty());
//        die();
//        echo '<hr />';
//        echo $product->getPrice();
//        $new_price = floor(2118000 * 105 / 100 );
//        $product->setPrice($new_price);
        // Get the quote item
        $item = $observer->getQuoteItem();
        // Ensure we have the parent item, if it has one
        $item = ( $item->getParentItem() ? $item->getParentItem() : $item );
        // Load the custom price
        $price = floor(105);
        // Set the custom price
        $item->setCustomPrice($price);
        $item->setOriginalCustomPrice($price);
        // Enable super mode on the product.
        $item->getProduct()->setIsSuperMode(true);
        //var_export($item);
    }
}