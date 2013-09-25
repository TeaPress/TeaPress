<?php

namespace TeaBlogTest\Controller;

use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

class IndexControllerTest extends AbstractHttpControllerTestCase
{
    protected $traceError = true;
    
    public function setUp() 
    {
        $this->setApplicationConfig(
                include __DIR__ . '/../../config/application.config.php'
        );
        parent::setUp();
    }

    public function testIndexActionCanBeAccessed() 
    {
        // Create Mock
        $postMapperMock = $this->getMockBuilder('TeaBlog\Mapper\Post')
                            ->disableOriginalConstructor()
                            ->getMock();

        $postMapperMock ->expects($this->once())
                        ->method('getLatestPosts')
                        ->will($this->returnValue(array()));
        
        $adapter = new \Zend\Paginator\Adapter\ArrayAdapter(array());
        $postMapperMock ->expects($this->once())
                        ->method('getAllPosts')
                        ->will($this->returnValue(new \Zend\Paginator\Paginator($adapter)));

        $categoryMapperMock = $this->getMockBuilder('TeaBlog\Mapper\Category')
                            ->disableOriginalConstructor()
                            ->getMock();

        $categoryMapperMock ->expects($this->once())
                        ->method('getAllRootCategory')
                        ->will($this->returnValue(array()));
        
        $serviceManager = $this->getApplicationServiceLocator();
        $serviceManager->setAllowOverride(true);
        $serviceManager->setService('TeaBlog\Mapper\Post', $postMapperMock);
        $serviceManager->setService('TeaBlog\Mapper\Category', $categoryMapperMock);

        // Start test
        $this->dispatch('/blog');
        $this->assertResponseStatusCode(200);

        $this->assertModuleName('TeaBlog');
        $this->assertControllerName('TeaBlog\Controller\Index');
        $this->assertControllerClass('IndexController');
        $this->assertMatchedRouteName('blog');
    }
}