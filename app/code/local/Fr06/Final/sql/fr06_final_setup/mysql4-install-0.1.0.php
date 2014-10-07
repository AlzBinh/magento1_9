<?php
/**
 * Created by PhpStorm.
 * User: zmerrychristmas
 * Date: 10/3/14
 * Time: 3:29 PM
 */
$installer = $this;
$installer->startSetup();
$tableName = Mage::getSingleton('core/resource')->getTableName('fr06_final/albums');
$installer->run("
    DROP TABLE IF EXISTS {$tableName};
  CREATE TABLE {$tableName} (
  `album_id` int(11) NOT NULL  AUTO_INCREMENT  ,
  `album_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL ,
  `album_description` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `album_status` int(2) NOT  NULL DEFAULT 1,
  primary key (`album_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
  ");

$installer->endSetup();