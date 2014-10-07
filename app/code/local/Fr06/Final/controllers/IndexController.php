<?php
/**
 * Created by PhpStorm.
 * User: zmerrychristmas
 * Date: 10/3/14
 * Time: 11:22 AM
 */
class Fr06_Final_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
//        $tableName = Mage::getSingleton('core/resource')->getTableName('fr06_final/albums');
//        echo $tableName;
//        $this->loadLayout(array('default'));
//        $this->renderLayout();
        echo '<pre>';
//        $collection = Mage::getModel('catalog/product')->getCollection();
//        $collection->addAttributeToSelect('name');
//        $collection->setOrder('name', 'asc');
//        $collection->load();
//        $sql = $collection->getSelect()->__toString();
//        $sql = explode(',',$sql);
//        var_export($sql);
//        $data = $collection->getData();
//        //var_export($data);
//        $category = Mage::getModel('catalog/category')->getCollection();
////        $productCollection = $category->getProductCollection();
//        //$data = $productCollection->getData();
//        $data = $category->getData();
//        $category = Mage::getModel('catalog/category')->load(1);
//        $productCollection = $category->getProductCollection();
//        $productCollection->addFieldToFilter('created_at', array('from' =>
//            '2012-12-01'));
//
//        $data = $productCollection->getData();
////        var_dump($data);
//        var_export($data);
        $products = Mage::getModel('catalog/category')->getCollection();
        $data = $products->getData();
       // var_dump($products);
        $_category = Mage::getModel('catalog/category')->load(CATEGORY-ID);
        $_categories = $_category
            ->getCollection()
            ->addAttributeToSelect(array('name', 'image', 'description'))
            ->addIdFilter($_category->getChildren());

        foreach ($_categories as $_category):
            echo $_category->getName();
        endforeach;
//            ->getProductCollection()
//            ->addAttributeToSelect('*') // add all attributes - optional
//            ->addAttributeToFilter('status', 1) // enabled
//            ->addAttributeToFilter('visibility', 4) //visibility in catalog,search
//            ->setOrder('price', 'ASC'); //sets the order by price
    }
}