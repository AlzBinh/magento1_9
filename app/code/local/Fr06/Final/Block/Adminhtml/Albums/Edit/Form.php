<?php
/**
 * Created by PhpStorm.
 * User: zmerrychristmas
 * Date: 10/3/14
 * Time: 6:01 PM
 */
class Fr06_Final_Block_Adminhtml_Albums_Edit_Form extends Mage_Adminhtml_Block_Widget_Form
{
    /**
     * Init class
     */
    public function __construct()
    {
        parent::__construct();

        $this->setId('fr06_final_albums_form');
        $this->setTitle($this->__('Album Information'));
    }

    /**
     * Setup form fields for inserts/updates
     *
     * return Mage_Adminhtml_Block_Widget_Form
     */
    protected function _prepareForm()
    {
//        $model = Mage::registry('fr06_final');
//
        $form = new Varien_Data_Form(array(
            'id'        => 'edit_form',
            'action'    => $this->getUrl('*/*/save', array('id' => $this->getRequest()->getParam('id'))),
            'method'    => 'post',
            'enctype' => 'multipart/form-data'
        ));
//
        $fieldset = $form->addFieldset('base_fieldset', array(
            'legend'    => Mage::helper('fr06_final')->__('Album Information'),
            'class'     => 'fieldset-wide',
        ));


        $fieldset->addField('album_title', 'text', array(
            'label'     => Mage::helper('fr06_final')->__('Title'),
            'class'     => 'required-entry',
            'required'  => true,
            'name'      => 'album_title',
        ));

        $fieldset->addField('album_logo', 'file', array(
            'label'     => Mage::helper('fr06_final')->__('File'),
            'required'  => false,
            'name'      => 'album_logo',
        ));

        $fieldset->addField('album_status', 'select', array(
            'label'     => Mage::helper('fr06_final')->__('Status'),
            'name'      => 'album_status',
            'values'    => array(
                array(
                    'value'     => 1,
                    'label'     => Mage::helper('fr06_final')->__('Enabled'),
                ),

                array(
                    'value'     => 2,
                    'label'     => Mage::helper('fr06_final')->__('Disabled'),
                ),
            ),
        ));

        $fieldset->addField('album_description', 'editor', array(
            'name'      => 'album_description',
            'label'     => Mage::helper('fr06_final')->__('Content'),
            'title'     => Mage::helper('fr06_final')->__('Content'),
            'style'     => 'width:700px; height:500px;',
            'wysiwyg'   => false,
            'required'  => true,
        ));
        $fieldset->addField('album_submit','submit', array(
           'name'       => 'save',
           'label'      => Mage::helper('fr06_final')->__('Save'),
           'title'      => Mage::helper('fr06_final')->__('Save'),
            'style'     =>  'width:75px; height: 25px; background: yellow'
        ));
        if ( Mage::getSingleton('adminhtml/session')->getAlbumData() )
        {
            $form->setValues(Mage::getSingleton('adminhtml/session')->getAlbumData());
            Mage::getSingleton('adminhtml/session')->getAlbumData(null);
        } elseif ( Mage::registry('album_data') ) {
            $form->setValues(Mage::registry('album_data')->getData());
        }
        // display message
        $this->getMessagesBlock()->getGroupedHtml() ;
        $form->setUseContainer(true);
        $this->setForm($form);

        return parent::_prepareForm();
    }
}