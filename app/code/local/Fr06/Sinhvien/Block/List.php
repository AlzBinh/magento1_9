<?php
/**
 * Created by PhpStorm.
 * User: zmerrychristmas
 * Date: 9/18/14
 * Time: 9:21 AM
 */

class Fr06_Sinhvien_Block_List extends Mage_Core_Block_Template
{
    protected $list_students;
    public function __construct()
    {        
        parent::__construct();
        if (! isset($_SESSION['list_students'])) {
            $_SESSION['list_students'] = array();
        }
        $this->list_students = $_SESSION['list_students'];
    }
    public function getData()
    {
        return $this->list_students;
    }
}