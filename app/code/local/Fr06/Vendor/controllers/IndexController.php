<?php
/**
 * Created by PhpStorm.
 * User: zmerrychristmas
 * Date: 9/29/14
 * Time: 8:55 AM
 */
class Fr06_Vendor_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction()
    {
        $this->loadLayout(array('default'));
        $this->renderLayout();
    }
    public function insertAction()
    {
        $this->loadLayout(array('default'));
        $this->renderLayout();
    }
    public function messageAction()
    {
        $this->loadLayout(array('default'));
        $this->renderLayout();
    }
    public function testEmailAction()
    {
        $config = array('ssl' => 'tls',
            'auth' => 'login',
            'username' => 'huybinh.ad@gmail.com',
            'password' => 'traitimmuathu');

        $transport = new Zend_Mail_Transport_Smtp('smtp.gmail.com', $config);

        $mail = new Zend_Mail();
        $mail->setBodyHtml('lala');
        $mail->setFrom('your@gmail.com');
        $mail->addTo('huybinh.ad@gmail.com', 'Adam  Lembert');
        $mail->setSubject('Profile Activation');
        $mail->send($transport);
//        $emailTemplate = Mage::getModel('core/email_template')->loadDefault('recurring_order_email_template');
//
////Getting the Store E-Mail Sender Name.
//        $senderName = "Nam";
//
////Getting the Store General E-Mail.
//        $senderEmail = 'huybinh.ad@gmail.com';
//
////Variables for Confirmation Mail.
//        $emailTemplateVariables = array();
//        $emailTemplateVariables['name'] = 'lala';
//        $emailTemplateVariables['email'] = 'huybinh.ad@gmail.com';
//
////Appending the Custom Variables to Template.
//        $processedTemplate = $emailTemplate->getProcessedTemplate($emailTemplateVariables);
//
////Sending E-Mail to Customers.
//        $mail = Mage::getModel('core/email')
//            ->setToName($senderName)
//            ->setToEmail('huybinh.ad@gmail.com')
//            ->setBody($processedTemplate)
//            ->setSubject('Subject :')
//            ->setFromEmail($senderEmail)
//            ->setFromName($senderName)
//            ->setType('html');
//        try{
//            //Confimation E-Mail Send
//            $mail->send();
//        }
//        catch(Exception $error)
//        {
//            Mage::getSingleton('core/session')->addError($error->getMessage());
//            return false;
//        }
    }

}