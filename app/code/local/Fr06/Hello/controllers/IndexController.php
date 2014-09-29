<?php
class Fr06_Hello_IndexController extends Mage_Core_Controller_Front_Action {
	
	public function indexAction()
	{
		$this->loadLayout(array("default"));
		$this->renderLayout();
		//var_dump(Mage::getConfig()->getBlockClassName('hello/hello'));
		//echo 'hello';
	}
	public function goodbyeAction()
	{
		$name = isset ($_GET['name']) ? $_GET['name'] : 'he ha';
		echo 'good bye ' . $name;
	}
	public function helloAction($name = '')
	{
		$this->loadLayout(array("default"));
		$this->renderLayout();
	}
}
?>