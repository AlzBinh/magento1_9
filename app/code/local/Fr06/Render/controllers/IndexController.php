<?php
/**
 * Created by PhpStorm.
 * User: zmerrychristmas
 * Date: 9/23/14
 * Time: 9:32 AM
 */
class Fr06_Render_IndexController extends Mage_Core_Controller_Front_Action
{
    // header struct
    protected $_zHeader ;
    protected $_zNofify;
    protected $_zWrapper ;
    protected $_zLeft ;
    protected $_zContent ;
    protected $_zRight ;
    protected $_zCenter ;

    protected $_zFooter ;

    protected $_zLogo;
    protected $_zHead;

    protected $_zMessages;
    //root page
    protected $_zRoot;
    //pointer to create block
    protected $_layout;

    protected $_zMenu;
    protected $_zBMenu;

    protected $_zBreadCrumbs;
	// array contain all layout
    protected $layout_list = array();
	public function indexAction()
	{
        $this->loadLayout();
        $this->renderLayout();
	}

}