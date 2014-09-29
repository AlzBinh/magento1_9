<?php
/**
 * Created by PhpStorm.
 * User: zmerrychristmas
 * Date: 9/28/14
 * Time: 10:05 PM
 */
class Alanstormdotcom_Weblog_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction ()
    {
        echo 'hello';
    }
    public function testModelAction()
    {
        $params = $this->getRequest()->getParams();
        $blogpost = Mage::getModel('core/resource');
//        echo("Loading the blogpost with an ID of ".$params['id']);
//        $blogpost->load($params['id']);
//        $data = $blogpost->getData();
        $read = $blogpost->getConnection('core_read');
        $query = 'SELECT * FROM ' . $blogpost->getTableName('catalog/
product');
       // $results = $read->fetchAll($query);

        var_dump($query);
        echo get_class($blogpost);

    }
}