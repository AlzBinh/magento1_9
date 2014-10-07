<?php
/**
 * Created by PhpStorm.
 * User: zmerrychristmas
 * Date: 10/3/14
 * Time: 4:07 PM
 */
class Fr06_Final_Block_Adminhtml_Albums extends Mage_Adminhtml_Block_Widget_Grid_Container
{
    public function __construct()
    {
        $this->_blockGroup = 'albums';
        $this->_controller = 'adminhtml_final';
        $this->_headerText = Mage::helper('fr06_final')->__('Album - Items');
        $this->_addButtonLabel= Mage::helper('fr06_final')->__('Add menu');
    }
    public function getMainButtonsHtml()
    {
        $html = parent::getMainButtonsHtml();//get the parent class buttons
        $addButton = $this->getLayout()->createBlock('adminhtml/widget_button') //create the add button
            ->setData(array(
                'label'     => Mage::helper('adminhtml')->__('Add'),
                'onclick'   => "setLocation('".$this->getUrl('*/*/new')."')",
                'class'   => 'task'
            ))->toHtml();
        return $addButton.$html;
    }
}