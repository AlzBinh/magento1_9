<?php
/**
 * Created by PhpStorm.
 * User: zmerrychristmas
 * Date: 9/25/14
 * Time: 11:43 PM
 */




class  Fr06_Sintax_Adminhtml_MyformControler extends  Mage_Adminhtml_Controller_Action
{
    public function indexAction()
    {
        $this->loadLayout()->renderLayout();
    }
    public function postAction()
    {
        $post = $this->getRequest()->getPost();
        try {
            if (empty($post)) {
                Mage::throwException($this->__('Invalid form data'));
            }
            $message = $this->__('Your form has been submmited successfully');
            Mage::getSingleton('adminhtml/session')->addSuccess($message);
        }catch(Exception $e)
        {
            Mage::getSingleton('adminhtml/session')->addError($e->getMessage());
        }
        $this->_redirect('*/*');
    }
} 