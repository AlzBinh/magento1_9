<?php
/**
 * Created by PhpStorm.
 * User: zmerrychristmas
 * Date: 10/3/14
 * Time: 5:39 PM
 */
class Fr06_Final_Block_Adminhtml_Template_Grid_Renderer_Image extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{
    public function render(Varien_Object $row)
    {
        return $this->_getValue($row);
    }
    protected function _getValue(Varien_Object $row)
    {
        $val = $row->getData($this->getColumn()->getIndex());
        $val = str_replace("no_selection", "", $val);
        $val = explode(Mage::getBaseDir() . '/media/', $val);

        $val = Mage::getBaseUrl('media')  . $val[1];
        $out = "<img src=". $val ." width='60px'/>";
        return $out;
    }
}