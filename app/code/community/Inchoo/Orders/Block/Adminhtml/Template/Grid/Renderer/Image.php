<?php
/**
 * Created by PhpStorm.
 * User: zmerrychristmas
 * Date: 10/3/14
 * Time: 5:19 PM
 */
class Fr06_Final_Block_Adminhtml_Template_Grid_Renderer_Image extends Mage_Adminhtml_Block_Widget_Grid_Column_Renderer_Abstract
{
    public function render(Varien_Object $row)
    {
        $mediaurl = Mage::getBaseUrl(Mage_Core_Model_Store::URL_TYPE_MEDIA);
        //$value = $row->getData($this->getColumn()->getIndex());
        return '<p style="text-align:center;padding-top:10px;"><img src="'.$mediaurl.DS.'"  style="width:100px;height:200px;text-align:center;"/></p>';
    }
}