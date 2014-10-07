<?php
/**
 * Created by PhpStorm.
 * User: zmerrychristmas
 * Date: 10/2/14
 * Time: 12:28 AM
 */
$tickets = Mage::getModel('inchoo_dbscript/ticket')
    ->getCollection();

foreach ($tickets as $ticket) {
    $ticket->setCreatedAt(strftime('%Y-%m-%d %H:%M:%S', time()))
        ->save();
}