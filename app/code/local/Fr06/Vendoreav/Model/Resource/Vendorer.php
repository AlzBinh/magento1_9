<?php
/**
 * Created by PhpStorm.
 * User: zmerrychristmas
 * Date: 10/1/14
 * Time: 4:30 PM
 */
class Fr06_Vendoreav_Model_Resource_Vendorer extends Mage_Eav_Model_Entity_Abstract
{
    protected function _construct()
    {
        $resource = Mage::getSingleton('core/resource');
        $this->setType('fr06_vendoreav/vendorer');
        $this->setConnection(
            $resource->getConnection('fr06_vendoreav_read'),
            $resource->getConnection('fr06_vendoreav_write')
        );
    }
}
