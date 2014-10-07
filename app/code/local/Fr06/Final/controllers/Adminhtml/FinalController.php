<?php
/**
 * Created by PhpStorm.
 * User: zmerrychristmas
 * Date: 10/3/14
 * Time: 2:59 PM
 */
class Fr06_Final_Adminhtml_FinalController extends Mage_Adminhtml_Controller_Action
{
    protected $_errors;
    public function indexAction()
    {
        $this->loadLayout();
        $grid = $this->getLayout()->createBlock('fr06_final/adminhtml_albums_grid');
        $this->_addContent($grid);
        $this->renderLayout();
    }
    public function newAction()
    {
        // We just forward the new action to a blank edit form
        $this->_forward('edit');
    }

    public function editAction()
    {
        //$block_b = $this->getLayout()->createBlock('core/template','contentb',array('template' => 'fr06/layout/content_b.phtml'));


        $id = $this->getRequest()->getParam('id');
        if ($id) {
            $model =  Mage::getModel('fr06_final/albums')->load($id);
            $data = Mage::getSingleton('adminhtml/session')->getFormData(true);
            if ($data) {
                $model->setData($data)->setId($id);
            }
            Mage::register('album_data', $model);
        }
        $form = $this->getLayout()->createBlock('fr06_final/adminhtml_albums_edit_form');
        $this->loadLayout();
        $notification =  $this->getLayout()->createBlock('core/messages')->addNotice('My Message');
        $this->_addContent($form);
        $this->renderLayout();
    }

    public function saveAction()
    {
        $id = $this->getRequest()->getParam('id');
        echo $id;
        $success = true;
        if ($postData = $this->getRequest()->getPost()) {
            $model = Mage::getSingleton('fr06_final/albums')->getCollection();
            $model->addFieldToFilter('album_title',array('album_title' => $postData['album_title']));
            $data = $model->getData();
            if ( empty($data) || $id)
            {
                // chua ton tai album - upload anh - tao moi album

                $album = array(
                    'album_title'   => $postData['album_title'],
                    'album_description'   => $postData['album_description'],
                    'album_status'   => $postData['album_status'],
                );
                $model = Mage::getModel('fr06_final/albums');
                if ($id != '' && $id != NULL) {
                    $model->load($id)->setData($album);
                }else
                    $model->setData($album);
                try {
                    if (! $id) {
                        $id = $model->save()->getId();
                    }else {
                        $model->setID($id)->save();
                    }
                    if (!$id) {
                        $success = false;
                        throw new Exception();
                    }else {
                        if ($_FILES['album_logo']['name']) {
                            try {
                                $path = Mage::getBaseDir().DS.'media'.DS.'fr06'.DS.'album'.DS.$id.DS; //desitnation directory
                                $fname = $_FILES['album_logo']['name']; //file name
                                $uploader = new Varien_File_Uploader('album_logo'); //load class
                                $uploader->setAllowedExtensions(array('jpg','png','jpeg','gif')); //Allowed extension for file
                                $uploader->setAllowCreateFolders(true); //for creating the directory if not exists
                                $uploader->setAllowRenameFiles(false); //if true, uploaded file's name will be changed, if file with the same name already exists directory.
                                $uploader->setFilesDispersion(false);
                                $ga = $uploader->save($path,$fname); //save the file on the specified path
                                $path = isset($ga['path']) ? $ga['path'].$ga['name'] : false;
                                Mage::log('file_upload_logo' . $path, 2);
                                echo $path;
                                if ($path) {
                                    $logo = array('logo'  => $path);
                                    $model =  Mage::getModel('fr06_final/albums')->load($id)->setData($logo);
                                    try {
                                        $model->setID($id)->save();

                                    }catch (Exception $ex){
                                        $success = false;
                                        $this->_errors['save'] = $this->__('Save Logo in Server Error !:') . $ex->getMessage() ;
                                    }
                                }
                            }catch (Exception $e)
                            {
                                $success = false;
                                $this->_errors['logo'] = $this->__('Not upload.') . $e->getMessage();
                            }
                        }
                    }
                }catch (Exception $ex) {
                    $success = fasle;
                    $this->_errors['Save Album'] = $ex->getMessage();
                }
                if($success) {
                    Mage::getSingleton('core/session')->addSuccess('Your Album save successfull');
                }else {
                    $this->addErrors();
                }
            }
            $this->_forward('edit');
        }
    }
    public function addErrors()
    {
        $sesssion = Mage::getSingleton('core/session');
        foreach ($this->_errors as $key => $value)
        {
            $sesssion->addError($value);
        }
    }
    public function messageAction()
    {
        $data = Mage::getModel('fr06_inal/albums')->load($this->getRequest()->getParam('id'));
        echo $data->getContent();
    }

    /**
     * Initialize action
     *
     * Here, we set the breadcrumbs and the active menu
     *
     * @return Mage_Adminhtml_Controller_Action
     */
    protected function _initAction()
    {
        $this->loadLayout()
            // Make the active menu match the menu config nodes (without 'children' inbetween)
            ->_setActiveMenu('adminhtml_final/item')
            ->_title($this->__('Sales'))->_title($this->__('Baz'))
            ->_addBreadcrumb($this->__('Sales'), $this->__('Sales'))
            ->_addBreadcrumb($this->__('Baz'), $this->__('Baz'));
        return $this;
    }

    /**
     * Check currently called action by permissions for current user
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        return Mage::getSingleton('admin/session')->isAllowed('sales/foo_bar_baz');
    }
    public function testAction()
    {
        $id = 3;
        $logo = array('album_logo' => 'haha');
        $model = Mage::getModel('fr06_final/albums')->load(3)->setData($logo);
        try {
            $model->setID(3)->save();
        }catch (Exception $e)
        {
            echo $e->getMessage();
        }
    }
    public function deleteAction($id)
    {
        $id = $this->getRequest()->getParam('id');
        if ($id){
            try {
                $model = Mage::getSingleton('fr06_final/albums');
                $model->load($id);
                $model->delete();
            }catch (Exception $ex){
                $this->_errors['Delete error'] = 'Delete error: ' . $ex->getMessage();
            }
        }else {
            Mage::getSingleton('core/session')->addError('Loading identified of album errors');
        }
        $this->addErrors();
        $this->_forward('index');
    }
}
