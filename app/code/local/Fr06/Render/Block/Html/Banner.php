<?php
/**
 * Created by PhpStorm.
 * User: zmerrychristmas
 * Date: 9/25/14
 * Time: 3:37 PM
 */
class Fr06_Render_Block_Html_Banner extends Mage_Core_Block_Template
{
    public function _construct()
    {
        $header = Mage::app()->getLayout()->getBlock('header');
        $header->setLogo('assets/img/logo/wlogo.jpg','here my logo');
    }
}