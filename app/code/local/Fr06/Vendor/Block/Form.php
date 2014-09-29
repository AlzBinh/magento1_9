<?php
/**
 * Created by PhpStorm.
 * User: zmerrychristmas
 * Date: 9/29/14
 * Time: 10:55 AM
 */
class Fr06_Vendor_Block_Form extends Mage_Core_Block_Template
{
    protected $_errors;
    protected $_succes;
    public function _construct()
    {
        $this->_succes = false;
        //var_dump($_POST);
        $post = Mage::app()->getRequest()->getPost();
        if (!empty($post)) {
            $id = $this->registerVendor($post);
            if ($id) {
                $this->_succes = true;
            }
        }
    }
    public function registerVendor($post)
    {
        //var_dump($_FILES);

        $name = $post['name'];
        $email = $post['email'];
        $phone = $post['telephone'];
        $paypal = $post['paypal'];
        $path = Mage::getBaseDir().DS.'media'.DS.'vendor'.DS; //desitnation directory
        if ($email) {
            $model = Mage::getSingleton('vendor/order')->getCollection();
            $model->addFieldToFilter('email',array('email' => $email));
            $data = $model->getData();
            if (empty($data)) {
                // no conflic email
                $vendor = array(
                    'name' => $name,
                    'email' => $email,
                    'phone' => $phone,
                    'account_id' => $paypal,
                );
                $model = Mage::getSingleton('vendor/order');
                $model->setData($vendor);
                try {
                    $id = $model->save()->getId();
                    if (!$id) {
                        throw new Exception();
                    }else {
                        if ($_FILES['logo']['name']) {
                            try {
                                $path = Mage::getBaseDir().DS.'media'.DS.'vendor'.DS.$id.DS; //desitnation directory
                                $fname = $_FILES['logo']['name']; //file name
                                $uploader = new Varien_File_Uploader('logo'); //load class
                                $uploader->setAllowedExtensions(array('jpg','png','jpeg','gif')); //Allowed extension for file
                                $uploader->setAllowCreateFolders(true); //for creating the directory if not exists
                                $uploader->setAllowRenameFiles(false); //if true, uploaded file's name will be changed, if file with the same name already exists directory.
                                $uploader->setFilesDispersion(false);
                                $ga = $uploader->save($path,$fname); //save the file on the specified path
                                $path = isset($ga['path']) ? $ga['path'].$ga['name'] : false;
                                if ($path) {
                                    $logo = array('logo'  => $path);
                                    $model =  Mage::getSingleton('vendor/order')->load($id)->addData($logo);
                                    try {
                                        $model->setID($id)->save();
                                    }catch (Exception $ex){
                                        $this->_errors['save'] = 'Save Logo in Server Error !:'. $ex->getMessage() ;
                                    }
                                }
                            }catch (Exception $e)
                            {
                                $this->_errors['logo'] = 'Not upload.' . $e->getMessage();
                            }

                            return $id;
                        }
                    }
                }catch (Exception $e)
                {
                    $this->_errors['insert']  = 'Some thing errors exists, please try again:( !';
                }
            }else {
                $this->_errors['email']  = 'Email exists, please try again:( !';
            }

        }
        $model = Mage::getSingleton('vendor/order');
    }
    public function getFormAction()
    {
        $url = Mage::getBaseUrl() . 'fr06-vendor/index/insert';
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
}