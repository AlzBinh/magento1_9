<?php
/**
 * Created by PhpStorm.
 * User: zmerrychristmas
 * Date: 10/6/14
 * Time: 4:43 PM
 */
class  Fr06_Final_Block_Adminhtml_Template_Grid_Renderer_Link extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{
    public function render(Varien_Object $row)
    {
        return $this->_getValue($row);
    }
    protected function _getValue(Varien_Object $row)
    {
        $val = $row->getData($this->getColumn()->getIndex());
        //return $out;
        $url = $this->getUrl('*/*/delete/id/' . $val);
        $val = '<a href="'.$url.'" alt="delete">Delete</a>';
        return $val;
    }
}