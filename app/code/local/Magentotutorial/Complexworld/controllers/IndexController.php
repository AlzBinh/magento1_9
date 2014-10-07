<?php

class Magentotutorial_Complexworld_IndexController extends Mage_Core_Controller_Front_Action
{
	public function indexAction()
	{
		//$model = Mage::getModel('complexworld/eavblogpost');
		//echo get_class($model) . '<br />';
		//$tableName = Mage::getSingleton('core/resource')->getTableName('complexworld/eavblogpost');
		//echo $tableName;
//		$weblog2 = Mage::getModel('complexworld/eavblogpost');
//		$weblog2->load(1);
//		var_dump($weblog2);
//        $attrib_data = array();
//
//        $allAttributeCodes = array();
//        $attributes = Mage::getResourceModel('catalog/product_attribute_collection')->getItems();
//
//        foreach ($attributes as $attribute)
//        {
//            $attrib_data[$attribute->getAttributeCode()] = $attribute->getData();
//        }
        echo '<pre />';
        echo 'hahaha';
//        var_export($attrib_data);
//        $products = Mage::getModel('catalog/product')->getCollection();
//        $products->addAttributeToFilter('sku','Fury-black-1');
//        $products->load();
//        foreach($products as $_prod) {
//            var_export($_prod->getData());
////        }
//        $products = Mage::getModel('catalog/product')->getCollection();
//        $products->addAttributeToFilter('entity_id',
//        array('in'=> array(1,2,36,899) )
//        );
//        $products->load();
//        foreach($products as $_prod) {
//            var_export($_prod->getData());
//        }
//        $products = Mage::getModel('catalog/product')->getCollection();
//        $products->addAttributeToFilter('entity_id',
//            array('in'=> array(1,2,36,35,899) )
//        );
//        $products->addAttributeToSelect('*');
//        $products->load();
//        foreach($products as $_prod) {
//            var_export($_prod->getData());
//        }
        $collection = mage::getModel('customer/customer')->getCollection()
            ->addAttributeToSelect('email')
            //->addAttributeToFilter('firstname', 'sander')
            ->addAttributeToSort('email', 'ASC');
        $data = $collection->getData();
        //var_dump((string)$collection->getSelect());
        var_export($data);
	}
    public function populateEntriesAction() {
        for ($i=0;$i<10;$i++) {
            $weblog2 = Mage::getModel('complexworld/eavblogpost');
            $weblog2->setTitle('This is a test '.$i);
            $weblog2->setContent('This is test content '.$i);
            $weblog2->setDate(now());
            $weblog2->save();
        }

        echo 'Done';
    }

    public function showCollectionAction() {
        $weblog2 = Mage::getModel('complexworld/eavblogpost');
        $entries = $weblog2->getCollection()
            ->addAttributeToSelect('title')
            ->addAttributeToSelect('content');
        $entries->load();
        foreach($entries as $entry)
        {
            // var_dump($entry->getData());
            echo '<h2>' . $entry->getTitle() . '</h2>';
            echo '<p>Date: ' . $entry->getDate() . '</p>';
            echo '<p>' . $entry->getContent() . '</p>';
        }
        echo '</br>Done</br>';
    }
}
