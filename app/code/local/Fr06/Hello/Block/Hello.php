<?php
class Fr06_Hello_Block_Hello extends Mage_Core_Block_Template
{
	protected $_name = '';
	public function __construct()
	{
		$this->_name = Mage::registry('fr06_hello_name');
	}
	public function index()
	{
		echo 'haha';
	}
	public function getName()
	{
		//var_dump (Mage::registry('fr06_hello_name'));
		//die();
		return $this->_name;
	}
	
}
?>