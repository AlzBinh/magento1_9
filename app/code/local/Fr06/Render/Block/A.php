<?php

class Fr06_Render_Block_A extends Mage_Core_Block_Template
{
    public function _construct()
    {
        parent::_construct();
        $this->toHtml();
    }
    public function __construct()
    {

    }
	public function changeLogo()
    {

        //$header = $controller->getLayout()->getBlock('header');

        //$header->setLogo('assets/img/logo/wlogo.jpg','here my logo');
       // echo "<script>alert('".$this->getLogoSrc(). "')</script>";
    }
}
