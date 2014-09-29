<?php
/**
 * Created by PhpStorm.
 * User: zmerrychristmas
 * Date: 9/21/14
 * Time: 8:11 AM
 */
class Fr06_Catalogs_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
//        $attribute = Mage::getModel('eav/config')->getAttribute('catalog_product','color');
//        foreach ($attribute->getSource()->getAllOptions(true) as $option) {
//            //echo $option['value'] . ' ' . $option['label'] . '<br />';
//            var_dump($option) ;echo '<br />';
//        }

        $this->loadLayout(array ("default"));
        $this->renderLayout();
    }
}