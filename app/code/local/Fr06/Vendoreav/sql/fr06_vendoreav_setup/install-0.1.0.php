<?php
///**
// * Created by PhpStorm.
// * User: zmerrychristmas
// * Date: 10/1/14
// * Time: 5:23 PM
// */
$installer = $this;

$installer->startSetup();
//$tableName = Mage::getSingleton('core/resource')->getTableName('fr06_vendorer/vendorer');
$setup = Mage::getModel('customer/entity_setup', 'core_setup');
$attributes = array (
    'customer_level'   => array (
        'type'    =>  'int',
        'input'   =>  'text',
        'label'   =>  'customer level',
        'global'  =>    1,
        'visible'   =>  1,
        'required'  => 0,
        'user_defined'  => 0,
        'default'   => 0,
        'visible_on_front'   =>     1,
        'source'    =>  NULL,
        'comment'   => '0 for buyer , 1 for seller'
    ),
    'vendor_name'   => array (
        'type'    =>  'varchar',
        'input'   =>  'text',
        'label'   =>  'vendor_name',
        'global'  =>    1,
        'visible'   =>  1,
        'required'  => false,
        'user_defined'  => 0,
        'default'   => 0,
        'visible_on_front'   =>     1,
        'source'    =>  NULL,
        'comment'   => 'vendor name for customer'
    ),
    'vendor_logo'  =>  array (
        'type'    =>  'text',
        'input'   =>  'text',
        'label'   =>  'vendor_logo',
        'global'  =>    1,
        'visible'   =>  1,
        'required'  => false,
        'user_defined'  => 0,
        'default'   => 0,
        'visible_on_front'   =>     1,
        'source'    =>  NULL,
        'comment'   => 'vendor logo for account customer'
    ),
    'vendor_paypal'  =>  array (
        'type'    =>  'varchar',
        'input'   =>  'text',
        'label'   =>  'vendor_paypal',
        'global'  =>    1,
        'visible'   =>  1,
        'required'  => false,
        'user_defined'  => 0,
        'default'   => 0,
        'visible_on_front'   =>     1,
        'source'    =>  NULL,
        'comment'   => 'vendor paypal account for account customer'
    ),
);
// prepare var
$customer = Mage::getModel('customer/customer');
$attrSetId = $customer->getResource()->getEntityType()->getDefaultAttributeSetId();

// doing
foreach ($attributes as $attribute_code => $attribute)
{
    $setup->addAttribute('customer', $attribute_code, $attribute);
    // add to attribute set
    if (version_compare(Mage::getVersion(), '1.6.0', '<=')) {
        $setup->addAttributeToSet('customer', $attrSetId, 'General', $attribute_code);
    }
    // add to eav/config
    if (version_compare(Mage::getVersion(), '1.4.2', '>=')) {
        Mage::getSingleton('eav/config')
            ->getAttribute('customer', $attribute_code)
            ->setData('used_in_forms', array('customer_account_create','customer_account_edit'))
            ->save();
    }
}
$attrCode = 'vendor_id';
$catalogEavSetup = Mage::getResourceModel('catalog/eav_mysql4_setup', 'core_setup');
$attrId = $catalogEavSetup->getAttributeId(Mage_Catalog_Model_Product::ENTITY, $attrCode);
$attrGroupName = 'vendor';
if ($attrId === false) {
    $catalogEavSetup->addAttribute(Mage_Catalog_Model_Product::ENTITY, $attrCode, array(
        'group' => $attrGroupName,
        'sort_order' => 7,
        'type' => 'int',
        'backend' => '',
        'frontend' => '',
        'label' => 'vendorAccount',
        'note' => 'Vendor upload product',
        'input' => 'text',
        'class' => '',
        'source' => '',
        'global' => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_GLOBAL,
        'visible' => true,
        'required' => false,
        'user_defined' => true,
        'default' => '0',
        'visible_on_front' => false,
        'unique' => false,
        'is_configurable' => false,
        'used_for_promo_rules' => true
    ));
}
$installer->endSetup();
//
//$installer = $this;
//
//$installer->startSetup ();
//
//$setup = Mage::getModel ( 'customer/entity_setup' , 'core_setup' );
//
////add budget
//$setup->addAttribute('customer', 'budget', array(
//    'type' => 'decimal',
//    'input' => 'text',
//    'label' => 'Budget',
//    'global' => 1,
//    'visible' => 1,
//    'required' => 0,
//    'user_defined' => 0,
//    'default' => '',
//    'visible_on_front' => 1,
//    'source' =>   NULL,
//    'comment' => 'This is a budget'
//));
//
//$installer->endSetup ();

//$installer = $this;
//$installer->startSetup();
//
//$installer->addEntityType('complexworld_eavblogpost', array(
////entity_mode is the URI you'd pass into a Mage::getModel() call
//    'entity_model'    => 'complexworld/eavblogpost',
//
////table refers to the resource URI complexworld/eavblogpost
////<complexworld_resource>...<eavblogpost><table>eavblog_posts</table>
//    'table'           =>'complexworld/eavblogpost',
//));
//
//$installer->createEntityTables(
//    $this->getTable('complexworld/eavblogpost')
//);
//
//$this->addAttribute('complexworld_eavblogpost', 'titles', array(
//    //the EAV attribute type, NOT a MySQL varchar
//    'type'              => 'varchar',
//    'label'             => 'Title',
//    'input'             => 'text',
//    'class'             => '',
//    'backend'           => '',
//    'frontend'          => '',
//    'source'            => '',
//    'required'          => true,
//    'user_defined'      => true,
//    'default'           => '',
//    'unique'            => false,
//));
//$this->addAttribute('complexworld_eavblogpost', 'contents', array(
//    'type'              => 'text',
//    'label'             => 'Content',
//    'input'             => 'textarea',
//));
//$this->addAttribute('complexworld_eavblogpost', 'dates', array(
//    'type'              => 'datetime',
//    'label'             => 'Post Date',
//    'input'             => 'datetime',
//    'required'          => false,
//));
//
//$installer->endSetup();