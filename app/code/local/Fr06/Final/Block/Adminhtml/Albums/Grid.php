<?php
/**
 * Created by PhpStorm.
 * User: zmerrychristmas
 * Date: 10/3/14
 * Time: 4:23 PM
 */
class Fr06_Final_Block_Adminhtml_Albums_Grid extends Mage_Adminhtml_Block_Widget_Grid
{
    public function __construct()
    {
        parent::__construct();
        $this->setId('fr06_final_grid');
        $this->setDefaultSort('album_id');
        $this->setDefaultDir('DESC');
        $this->setSaveParametersInSession(true);
        $this->setUseAjax(true);


    }

    protected function _prepareCollection()
    {
        $collection = Mage::getResourceModel('fr06_final/albums_collection');
        $this->setCollection($collection);
        parent::_prepareCollection();
        return $this;
    }

    protected function _prepareColumns()
    {
        $helper = Mage::helper('fr06_final');
        $currency = (string) Mage::getStoreConfig(Mage_Directory_Model_Currency::XML_PATH_CURRENCY_BASE);

        $this->addColumn('album_title', array(
            'header' => $helper->__('Album Title'),
            'index'  => 'album_title',
            'width'  => '150px'
        ));

        $this->addColumn('logo', array(
            'header' => $helper->__('Logo'),
            'align' => 'left',
            'index' => 'logo',
            'width'     => '150px',
            'renderer' => 'Fr06_Final_Block_Adminhtml_Template_Grid_Renderer_Image'
        ));

        $this->addColumn('album_description', array(
            'header'       => $helper->__('Album Description'),
            'index'        => 'album_description',
        ));

        $this->addColumn('album_status', array(
            'header'       => $helper->__('Status'),
            'index'        => 'album_status'
        ));
        $this->addColumn('album_action', array(
            'header'       => $helper->__('Album delete'),
            'index'        => 'album_id',
            'renderer'     => 'Fr06_Final_Block_Adminhtml_Template_Grid_Renderer_Link',
        ));
//        $this->setChild('add_button',
//                $this->getLayout()->createBlock('adminhtml/widget_button')
//                ->setData(array(
//                        'label' => Mage::helper('fr06_final')->__('add menu'),
//                        'id'    => 'add_button',
//                        'name'  => 'add_button',
//                        'element_name'  =>  'add_button',
//                        'class' => 'add',
//                        'onclick'   =>  'k'
//                    ))
//        );

//        $this->addColumn('city', array(
//            'header' => $helper->__('City'),
//            'index'  => 'city'
//        ));
//
//        $this->addColumn('country', array(
//            'header'   => $helper->__('Country'),
//            'index'    => 'country_id',
//            'renderer' => 'adminhtml/widget_grid_column_renderer_country'
//        ));
//
//        $this->addColumn('customer_group', array(
//            'header' => $helper->__('Customer Group'),
//            'index'  => 'customer_group_code'
//        ));
//
//        $this->addColumn('grand_total', array(
//            'header'        => $helper->__('Grand Total'),
//            'index'         => 'grand_total',
//            'type'          => 'currency',
//            'currency_code' => $currency
//        ));
//
//        $this->addColumn('shipping_method', array(
//            'header' => $helper->__('Shipping Method'),
//            'index'  => 'shipping_description'
//        ));
//
//        $this->addColumn('order_status', array(
//            'header'  => $helper->__('Status'),
//            'index'   => 'status',
//            'type'    => 'options',
//            'options' => Mage::getSingleton('sales/order_config')->getStatuses(),
//        ));

        $this->addExportType('*/*/exportInchooCsv', $helper->__('CSV'));
        $this->addExportType('*/*/exportInchooExcel', $helper->__('Excel XML'));

        return parent::_prepareColumns();
    }

    public function getRowUrl($row)
    {
        // This is where our row data will link to
        return $this->getUrl('*/*/edit', array('id' => $row->getId()));
    }
}