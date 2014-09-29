<?php

class Fr06_Hello_Model_Observer
{
	public function hello($observer)
	{
		$fr06_hello_name = '';
		$action = Mage::app()->getFrontController()->getAction()->getFullActionName();
		Mage::log('hello : ' . $action, 1);
		$param  = Mage::app()->getFrontController()->getRequest()->getParams();
		Mage::log('hello_param: ' . serialize($param) , 1);
		//var_export($action);
		////die();
		if (strtolower($action) == 'hello_index_hello' && ! empty($param)) {
			
			foreach ($param as $key => $value)
			{
				if (strtolower ($key) == 'name') {
					$fr06_hello_name = $value;
					//var_export($param);
					//die();
				}
			}
		}
		Mage::register('fr06_hello_name', $fr06_hello_name);
		return $this;
	}
}
