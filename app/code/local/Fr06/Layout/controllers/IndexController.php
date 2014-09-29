<?php
/**
 * Created by PhpStorm.
 * User: zmerrychristmas
 * Date: 9/23/14
 * Time: 9:32 AM
 */
class Fr06_Layout_IndexController extends Mage_Core_Controller_Front_Action
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
    public function _construct()
    {
        parent::_construct();
        $this->_layout = $this->getLayout();
        $this->createLayout();
    }
    protected function createLayout($mode  = 1)
    {
        if ($mode == 1)
        {
            $this->_zRoot = $this->_layout->createBlock('page/html','z_root');
            $this->_zHead = $this->_layout->createBlock('page/html_head','z_head');
            $this->_zHeader = $this->_layout->createBlock('page/html_header','z_header')->setTemplate('fr06/layout/struct/header.phtml');
            $this->_zWrapper = $this->_layout->createBlock('page/html_wrapper','z_wrapper')->setTemplate('fr06/layout/struct/wrapper.phtml');;
            $this->_zLeft = $this->_layout->createBlock('core/text_list','z_left')->setTemplate('fr06/layout/struct/left.phtml');
            $this->_zRight = $this->_layout->createBlock('core/text_list','z_right')->setTemplate('fr06/layout/struct/right.phtml');
            $this->_zCenter = $this->_layout->createBlock('core/text_list','z_center')->setTemplate( 'fr06/layout/struct/center.phtml');
            $this->_zFooter = $this->_layout->createBlock('page/html_footer','z_footer')->setTemplate('fr06/layout/struct/footer.phtml');
            $this->_zLogo = $this->_layout->createBlock('core/template','z_logo')->setTemplate('fr06/layout/struct/logo.phtml');
            $this->_zMessages = $this->_layout->createBlock('core/messages','z_message')->setTemplate('fr06/layout/struct/message.phtml');
            $this->_zMenu = $this->_layout->createBlock('page/template_links','z_menu')->setTemplate('fr06/layout/struct/top_menu.phtml');
            $this->_zBMenu = $this->_layout->createBlock('page/template_links','z_bmenu')->setTemplate('fr06/layout/struct/bottom_menu.phtml');
            $this->_zBreadCrumbs = $this->_layout->createBlock('page/html_breadcrumbs','z_breadcrumbs')->setTemplate('fr06/layout/struct/breadcrumbs.phtml');
            $this->_zNofify = $this->_layout->createBlock('page/html_notices','z_notify')->setTemplate('fr06/layout/struct/notify.phtml');
            //$this->_zWrapper->append($this->_zLeft);
            //$this->_zWrapper->append($this->_zCenter);
            //$this->_zWrapper->append($this->_zRight);

            $this->_zHeader->append($this->_zNofify);
            $this->_zHeader->append($this->_zLogo);
            $this->_zHeader->setLogo('assets/img/logo/logo.png','here my logo');
            $this->_zCenter->append($this->_zMessages);

            $this->_zHead->addCss('assets/css/bootstrap.min.css');
            $this->_zHead->addItem('skin_js','assets/js/jquery.min.js');
            $this->_zHead->addItem('skin_js','assets/js/bootstrap.min.js');
            $this->_zHead->setTitle('Magento custom layout');
            $this->_zBreadCrumbs->addCrumb('lala','label');
            $this->_zFooter->append($this->_zBMenu);
            //array_push($this->layout_list,$this->_zFooter);
            //array_push($this->layout_list,$this->_zLeft);
            //array_push($this->layout_list,$this->_zRight);
            //array_push($this->layout_list,$this->_zCenter);
            //array_push($this->layout_list,$this->_zWrapper);
            //array_push($this->layout_list,$this->_zNofify);
            //array_push($this->layout_list,$this->_zLogo);
            //array_push($this->layout_list,$this->_zHeader);
            //array_push($this->layout_list,$this->_zHead);
            //echo $this->_zHead->toHtml();
        }
    }

    public function indexAction()
    {
        $this->loadLayout();
        $block_a = $this->_layout->createBlock('core/template','contenta',array('template' => 'fr06/layout/content_a.phtml'));
        $block_b = $this->_layout->createBlock('core/template','contentb',array('template' => 'fr06/layout/content_b.phtml'));
        $block_c = $this->_layout->createBlock('core/template','contentc',array('template' => 'fr06/layout/content_c.phtml'));
        $block_d = $this->_layout->createBlock('core/template','contentd',array('template' => 'fr06/layout/content_d.phtml'));
        $this->addContent($block_a);
        $this->addContent($block_b);
        $this->addLeft($block_c);
        $this->addRight($block_d);
        $root = $this->_layout->getBlock('root');
        $this->_zRoot->setTemplate('page/3columns-custom.phtml');
        $this->_zRoot->append($this->_zHead);
        $this->_zRoot->append($this->_zHeader);
        $this->_zRoot->append($this->_zMenu);
        $this->_zRoot->setChild('z_breadcrumbs',$this->_zBreadCrumbs);
        $this->_zRoot->append($this->_zFooter);
        $this->_zRoot->append($this->_zBMenu);
        $this->_zRoot->append($this->_zCenter);
        $this->_zRoot->append($this->_zLeft);
        $this->_zRoot->append($this->_zRight);

        $root = $this->_layout->getBlock('root');

        $root->append('z_root');
        $root->setTemplate('page/empty.phtml');
        $this->renderLayout();

    }
    protected function addLeft($block)
    {
        $this->_zLeft->append($block);
        return $this;
    }
    protected function addRight($block)
    {
        $this->_zRight->append($block);
    }
    protected function addContent($block,$possition = 1)
    {
        if ($possition == 1)
        {
            $this->_zCenter->append($block);
        }
        return $this;
    }
    protected function addHeader($block)
    {
        $this->_zHeader->append($block);
        return $this;
    }
    protected  function addHead($block)
    {
        $this->_zHead->append($block);
        return $this;
    }
    protected function addFooter($block)
    {
        $this->_zFooter->append($block);
        return $this;
    }
    protected function  before($target, $block)
    {

    }
    protected function setRootTemplate($name)
    {
        $content = $this->_layout->getBlock('root');
        return $this;
    }
    protected function getRoot ()
    {
        $this->_layout->getBlock('root')->setTemplate('page/3columns-custom.phtml');
    }
}