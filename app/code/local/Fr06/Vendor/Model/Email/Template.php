<?php
/**
 * Created by PhpStorm.
 * User: zmerrychristmas
 * Date: 9/29/14
 * Time: 5:33 PM
 */
class Fr06_Vendor_Model_Email_Template extends Mage_Core_Model_Email_Template
{
    public function _construct()
    {
    }
    public function send($email, $name = null, array $variables = array())
    {

        $_helper = Mage::helper('smtppro');
        // If it's not enabled, just return the parent result.
        if (!$_helper->isEnabled()) {
            $_helper->log('SMTP Pro is not enabled, fall back to parent class');
            return parent::send($email, $name, $variables);
        }


        // As per parent class - except addition of before and after send events

        if (!$this->isValidForSend()) {
            $_helper->log('Email is not valid for sending, this is a core error that often means there\'s a problem with your email templates.');
            Mage::logException(new Exception('This letter cannot be sent.')); // translation is intentionally omitted
            return false;
        }

        $emails = array_values((array)$email);
        $names = is_array($name) ? $name : (array)$name;
        $names = array_values($names);
        foreach ($emails as $key => $email) {
            if (!isset($names[$key])) {
                $names[$key] = substr($email, 0, strpos($email, '@'));
            }
        }

        $variables['email'] = reset($emails);
        $variables['name'] = reset($names);

        ini_set('SMTP', Mage::getStoreConfig('system/smtp/host'));
        ini_set('smtp_port', Mage::getStoreConfig('system/smtp/port'));

        $mail = $this->getMail();

        $setReturnPath = Mage::getStoreConfig(self::XML_PATH_SENDING_SET_RETURN_PATH);
        switch ($setReturnPath) {
            case 1:
                $returnPathEmail = $this->getSenderEmail();
                break;
            case 2:
                $returnPathEmail = Mage::getStoreConfig(self::XML_PATH_SENDING_RETURN_PATH_EMAIL);
                break;
            default:
                $returnPathEmail = null;
                break;
        }

        if ($returnPathEmail !== null) {
            $mailTransport = new Zend_Mail_Transport_Sendmail("-f".$returnPathEmail);
            Zend_Mail::setDefaultTransport($mailTransport);
        }

        foreach ($emails as $key => $email) {
            $mail->addTo($email, '=?utf-8?B?' . base64_encode($names[$key]) . '?=');
        }

        $this->setUseAbsoluteLinks(true);
        $text = $this->getProcessedTemplate($variables, true);

        if($this->isPlain()) {
            $mail->setBodyText($text);
        } else {
            $mail->setBodyHTML($text);
        }

        $mail->setSubject('=?utf-8?B?' . base64_encode($this->getProcessedTemplateSubject($variables)) . '?=');
        $mail->setFrom($this->getSenderEmail(), $this->getSenderName());

        try {

            $transport = new Varien_Object();
            Mage::dispatchEvent('aschroder_smtppro_template_before_send', array(
                'mail' => $mail,
                'template' => $this,
                'variables' => $variables,
                'transport' => $transport
            ));

            if ($transport->getTransport()) { // if set by an observer, use it
                $mail->send($transport->getTransport());
            } else {
                $mail->send();
            }

            foreach ($emails as $key => $email) {
                Mage::dispatchEvent('aschroder_smtppro_after_send', array(
                    'to' => $email,
                    'template' => $this->getTemplateId(),
                    'subject' => $this->getProcessedTemplateSubject($variables),
                    'html' => !$this->isPlain(),
                    'email_body' => $text));
            }

            $this->_mail = null;
        }
        catch (Exception $e) {
            $this->_mail = null;
            Mage::logException($e);
            return false;
        }

        return true;
    }
    public function getMail()
    {
        if (is_null($this->_mail))
        {
            /* changes begin */
            $my_smtp_host = Mage::getStoreConfig('system/smtp/host');
            $my_smtp_port = Mage::getStoreConfig('system/smtp/port');
            $config = array(
                'port' => $my_smtp_port,
                'auth' => 'login',
                'username' => 'huybinh.ad@gmail.com',
                'password' => 'traitimmuathu',
            );
            $transport = new Zend_Mail_Transport_Smtp($my_smtp_host, $config);
            Zend_Mail::setDefaultTransport($transport);
            /* Changes End */
            $this->_mail = new Zend_Mail('utf-8');
        }
        return $this->_mail;
    }
}