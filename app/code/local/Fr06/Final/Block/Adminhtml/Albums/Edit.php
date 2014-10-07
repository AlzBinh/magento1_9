<?php
/**
 * Created by PhpStorm.
 * User: zmerrychristmas
 * Date: 10/3/14
 * Time: 7:13 PM
 */
class Fr06_Final_Block_Adminhtml_Albums_Edit extends Mage_Adminhtml_Block_Widget_Form_Container
{

    public function __construct()
    {
        parent::__construct();
        $this->_objectId = 'id';
        //vwe assign the same blockGroup as the Grid Container
        $this->_blockGroup = 'albums';
        //and the same controller
        $this->_controller = 'adminhtml_final';
        //define the label for the save and delete button
        $this->_updateButton('save', 'label','save reference');
        $this->_updateButton('delete', 'label', 'delete reference');
//        $this->_updateButton('save', 'label', Mage::helper('web')->__('Save Item'));
//        $this->_updateButton('delete', 'label', Mage::helper('web')->__('Delete Item'));

    }
    /* Here, we're looking if we have transmitted a form object,
       to update the good text in the header of the page (edit or add) */
    public function getHeaderText()
    {
        if( Mage::registry('album_data')&&Mage::registry('album_data')->getId())
        {
            return 'Editer la reference '.$this->htmlEscape(
                Mage::registry('album_data')->getTitle()).'<br />';
        }
        else
        {
            return 'Add a contact';
        }
    }
}