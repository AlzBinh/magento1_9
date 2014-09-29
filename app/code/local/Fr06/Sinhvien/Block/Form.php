<?php

class Fr06_Sinhvien_Block_Form extends Mage_Core_Block_Template
{
	protected $_msv;
	public function __construct()
	{
		parent::__construct();
	}
	
	public function getStudentData($id = '')
	{
	//
		$this->_msv =  Mage::registry('msv');
		$student = array();
		$list_students = $_SESSION['list_students'] ? $_SESSION['list_students'] : array();
		foreach($list_students as $k=> $s)
		{
			if ($s['msv'] == $this->_msv)
			{
				$student = $list_students[$k];
				break;
			}
		}
		return $student;
	}
}
