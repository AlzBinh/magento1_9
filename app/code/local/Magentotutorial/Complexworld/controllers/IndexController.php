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
//        var_export($attrib_data);
        $products = Mage::getModel('catalog/product')->getCollection();
        $products->addAttributeToFilter('sku','Fury-black-1');
        $products->load();
        foreach($products as $_prod) {
            var_export($_prod->getData());
        }
	}
}
