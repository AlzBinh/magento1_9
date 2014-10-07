<?php
/**
 * Created by PhpStorm.
 * User: zmerrychristmas
 * Date: 10/2/14
 * Time: 12:14 AM
 */
$installer = $this;
$connection = $installer->getConnection();

$installer->startSetup();

$installer->getConnection()
    ->addColumn($installer->getTable('inchoo_dbscript/ticket'),
        'created_at',
        array(
            'type' => Varien_Db_Ddl_Table::TYPE_TIMESTAMP,
            'nullable' => true,
            'default' => null,
            'comment' => 'Created At'
        )
    );

$installer->endSetup();