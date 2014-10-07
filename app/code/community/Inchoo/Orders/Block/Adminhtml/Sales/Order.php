<?php
/**
 * Created by PhpStorm.
 * User: zmerrychristmas
 * Date: 10/3/14
 * Time: 4:17 PM
 */
class Inchoo_Orders_Block_Adminhtml_Sales_Order extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_blockGroup = 'inchoo_orders';
        $this->_controller = 'adminhtml_sales_order';
        $this->_headerText = Mage::helper('inchoo_orders')->__('Orders - Inchoo');

        parent::__construct();
        $this->_removeButton('add');
    }
}