<?php

namespace TeaBlogTest\View\Helper;

class CategoryTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var Zend_View_Helper_InlineScript
     */
    public $helper;

    /**
     * Sets up the fixture, for example, open a network connection.
     * This method is called before a test is executed.
     *
     * @return void
     */
    public function setUp() {
        $this->helper = new \TeaBlog\View\Helper\Category();
    }
    
    public function testCategoryReturnsObjectInstance()
    {
        $placeholder = $this->helper->__invoke();
        $this->assertTrue($placeholder instanceof \TeaBlog\View\Helper\Category);
    }
    
    public function testCategoryFullReturnsObjectInstance()
    {
        $placeholder = $this->helper->__invoke(array('display' => 'full'));
        $this->assertTrue($placeholder instanceof \TeaBlog\View\Helper\Category);
    }
    
    public function testCategoryRootReturnsObjectInstance()
    {
        $placeholder = $this->helper->__invoke(array('display' => 'root'));
        $this->assertTrue($placeholder instanceof \TeaBlog\View\Helper\Category);
    }
}