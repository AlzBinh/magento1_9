<?php
/**
 * Created by PhpStorm.
 * User: zmerrychristmas
 * Date: 9/29/14
 * Time: 1:50 PM
 */
class Fr06_Vendor_Block_List extends Mage_Core_Block_Template
{
    public function listStudents()
    {
        $listStudents = Mage::getSingleton('vendor/order')->getCollection()->getData('name');
        $base_dir = Mage::getBaseDir();
        $base_url = Mage::getBaseUrl();
        foreach ($listStudents as $key => $stu) {
            $src = $stu['logo'];
            if ($src != '' && $src) {
                $src = str_ireplace($base_dir, $base_url, $src);
                $listStudents[$key]['logo'] = $src;
            }
        }
        return $listStudents;
    }
    public function getIndex($i)
    {
        return $i;
    }
    public function getUrlInserter()
    {
        $url = Mage::getBaseUrl() . 'fr06-vendor/index/insert';
        return $url;
    }
    public function getUrlMessage()
    {
        $url = Mage::getBaseUrl().'fr06-vendor/index/message';
        return $url;
    }
}