<?php

$installer = $this;
$installer->startSetup();
$tableName = Mage::getSingleton('core/resource')->getTableName('vendor/order');
$installer->run("
    DROP TABLE IF EXISTS {$tableName};
  CREATE TABLE {$tableName} (
  `vendor_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(128) COLLATE utf8_unicode_ci DEFAULT NULL,
  `logo` mediumtext COLLATE utf8_unicode_ci,
  `email` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` int(17) NOT NULL,
  `account_id` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
  ");

$installer->endSetup();