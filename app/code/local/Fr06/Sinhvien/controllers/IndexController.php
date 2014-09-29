<?php
/**
 * Created by PhpStorm.
 * User: zmerrychristmas
 * Date: 9/17/14
 * Time: 9:18 PM
 */


class Fr06_Sinhvien_IndexController extends Mage_Core_Controller_Front_Action
{
    public function indexAction ()
    {
        var_dump(Mage::getConfig()->getBlockClassName('sinhvien/list'));
        $this->loadLayout(array("default"));
        $this->renderLayout();
       // var_dump($_SESSION);
    }

    public function insertAction()
    {
        $this->action();
        $this->loadLayout(array("default"));
        $this->renderLayout();
    }

    public function updateAction($msv)
    {
        $this->action();
        $msv = $this->getRequest()->getParam('msv');
        $this->loadLayout(array('default'));
        Mage::register('msv',$msv);
        $this->renderLayout();
    }
    public function deleteAction($msv)
    {
        $msv = $this->getRequest()->getParam('msv');
        $this->loadLayout(array('default'));
        $list_students  = $_SESSION['list_students'] ? $_SESSION['list_students'] : array();
        foreach ($list_students as $key => $value)
        {
            if ($value ['msv'] == $msv) unset($list_students[$key]);
            break;
        }
        $this->renderLayout();
    }
    protected function action()
    {
        if (isset($_POST['submit']) && $_POST['submit']) {
            $students = array ();
            $students['msv'] = $_POST['msv'];
            $students['name'] = $_POST['name'];
            $students['email'] = $_POST['email'];
            $list_students = $_SESSION['list_students'] ? $_SESSION['list_students'] : array();
            $break = false;
            foreach($list_students as $key => $s)
            {
                if ($s['msv'] == $students['msv']){
                    $list_students[$key] = $students;
                    $break = true;
                    break;
                }
            }
            if (! $break) {
                $list_students[] = $students;
            }
            $_SESSION['list_students'] = $list_students;
        }        
    }

}