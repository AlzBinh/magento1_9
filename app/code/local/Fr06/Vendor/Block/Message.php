<?php
/**
 * Created by PhpStorm.
 * User: zmerrychristmas
 * Date: 9/29/14
 * Time: 10:55 AM
 */
class Fr06_Vendor_Block_Message extends Mage_Core_Block_Template
{
    protected $_errors;
    protected $_succes;
    protected $_email;
    protected $my_email;
    protected $my_pass;
    public function _construct()
    {
        // setup sender email
        $this->my_email = Mage::getSingleton('core/session')->getData('my_email');
        $this->my_pass = Mage::getSingleton('core/session')->getData('my_pass');
        $this->my_pass =  Mage::helper('core')->decrypt( $this->my_pass);

        // setting up email information
        $id = Mage::app()->getRequest()->getParam('id');
        $vendor = Mage::getSingleton('vendor/order')->load($id);
        $this->_email = $vendor->getData('email');
        $this->_succes = false;

        // processing email form submit
        $post = Mage::app()->getRequest()->getPost();
        if (!empty($post)) {
            $result = $this->messageVendor($post);
            if ($result) {
                $this->_succes = true;
            }
        }
    }
    public function messageVendor($post)
    {
        //sender
        $this->my_email = $post['my_email'];
        $this->my_pass = $post['my_pass'];
        $my_pass_enc = Mage::app()->getHelper('core')->encrypt($this->my_pass);
        Mage::getSingleton('core/session')->setData('my_email', $this->my_email);
        Mage::getSingleton('core/session')->setData('my_pass', $my_pass_enc);

        // receiver
        $name = $post['name'];
        $email = $post['email'];
        $phone = $post['telephone'];
        $message = $post['message'];
        $title = $post['title'];

        //send mail
        if ($email) {
            $model = Mage::getSingleton('vendor/order')->getCollection();
            $model->addFieldToFilter('email',array('email' => $email));
            $data = $model->getData();
            if (! empty($data)) {
                $result = $this->wrappperEmail($email, $name , $title, $message);
                return $result;
            }
        }
    }
    public function getFormAction()
    {
        $id = Mage::app()->getRequest()->getParam('id');
        $url = Mage::getBaseUrl() . 'fr06-vendor/index/message/id/' . $id;
        return $url;
    }
    public function Errors()
    {
        return $this->_errors;
    }
    public function success()
    {
        return $this->_succes;
    }
    public  function getListUrl()
    {
        $url = Mage::getBaseUrl().'fr06-vendor/index/index';
        return $url;
    }
    public function getUserEmail()
    {
        return $this->_email;
    }
    public function wrappperEmail($email, $name,$title, $body)
    {
        try {
            $config = array('ssl' => 'tls',
                'auth' => 'login',
                'username' => $this->my_email,
                'password' => $this->my_pass
            );

            $transport = new Zend_Mail_Transport_Smtp('smtp.gmail.com', $config);

            $mail = new Zend_Mail();
            $mail->setBodyHtml($body);
            $mail->setFrom($this->my_email);
            $mail->addTo($email, $name);
            $mail->setSubject($title);
            $mail->send($transport);
            return 1;
        }catch (Exception $ex)
        {
            $this->_errors['email'] = 'Email send error '. $ex->getMessage() ;
            echo $ex->getMessage();
            die();
            return 0;
        }
    }
    public function getSenderEmail()
    {
        return $this->my_email;
    }
    public function  getPasswordSender()
    {
        return $this->my_pass;
    }
}