<?php

	class Trainning_Binhnh_Block_List extends Mage_Core_Block_Template
	{
		protected $_customer ;
		protected $_cartItems;
		public function __construct()
		{
			$this->_customer = array();
			if (isset($_POST['submit'])) {
				$this->_customer['name'] = $_POST['name'];
				$this->_customer['email'] = $_POST['email'];
				$this->_customer['address'] = $_POST['address'];
				$this->_customer['phone'] = $_POST['phone'];
				Mage::register('customer_info', $this->_customer);
			}
        $quote = Mage::getSingleton('checkout/session')->getQuote();
        $this->_cartItems = $quote->getAllVisibleItems();
		}
		public function getCustomerInfo()
		{
			$this->_customer = $this->_customer  ? $this->_customer : Mage::registry('customer_info');
			return $this->_customer;
		}
		public function getCartInfo()
		{
			return $this->_cartItems;
		}
	}
	
?>