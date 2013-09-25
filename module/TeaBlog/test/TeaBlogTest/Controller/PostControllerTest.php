<?php

namespace TeaBlogTest\Controller;

use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;

class PostControllerTest extends AbstractHttpControllerTestCase
{
    protected $traceError = true;
    
    public function setUp() 
    {
        $this->setApplicationConfig(
                include __DIR__ . '/../../config/application.config.php'
        );
        parent::setUp();
    }

    public function testSingleActionCanBeAccessedWithValidUrlKey() 
    {
        // Create Mock
        $postMapperMock = $this->getMockBuilder('TeaBlog\Mapper\Post')
                            ->disableOriginalConstructor()
                            ->getMock();

        $postMapperMock ->expects($this->once())
                        ->method('getLatestPosts')
                        ->will($this->returnValue(array()));
        
        $post = new \TeaBlog\Model\Post();
        $post->setPostId(1);
        $post->setUrlKey('test-single-post');
        $post->setTitle('test');
        $post->setDescription('testDescription');
        $post->setCreatedAt('2013-09-25 00:00:00');
        
        $postMapperMock ->expects($this->once())
                        ->method('getPostByUrlKey')
                        ->will($this->returnValue($post));

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
        $this->dispatch('/blog/post/test-single-post');
        $this->assertResponseStatusCode(200);

        $this->assertModuleName('TeaBlog');
        $this->assertControllerName('TeaBlog\Controller\Post');
        $this->assertControllerClass('PostController');
        $this->assertMatchedRouteName('blog/post');
    }
    
    public function testCategoryActionCanBeAccessedWithValidUrlKey() 
    {
        // Create Mock
        $postMapperMock = $this->getMockBuilder('TeaBlog\Mapper\Post')
                            ->disableOriginalConstructor()
                            ->getMock();
        
        // Need for latest widget
        $postMapperMock ->expects($this->once())
                        ->method('getLatestPosts')
                        ->will($this->returnValue(array()));
        
        $adapter = new \Zend\Paginator\Adapter\ArrayAdapter(array());
        $postMapperMock ->expects($this->once())
                        ->method('getPostsFromCategoryUrlKey')
                        ->will($this->returnValue(new \Zend\Paginator\Paginator($adapter)));

        $categoryMapperMock = $this->getMockBuilder('TeaBlog\Mapper\Category')
                            ->disableOriginalConstructor()
                            ->getMock();
        
        // Need for category widget 
        $categoryMapperMock ->expects($this->once())
                            ->method('getAllRootCategory')
                            ->will($this->returnValue(array()));
        
        $category = new \TeaBlog\Model\Category();
        $category->setCategoryId(1);
        $category->setUrlKey('test-category');
        $category->setTitle('test');
        $category->setCreatedAt('2013-09-25 00:00:00');
        
        // Need for page
        $categoryMapperMock ->expects($this->once())
                            ->method('getCategoryFromUrlKey')
                            ->will($this->returnValue($category));
        
        $serviceManager = $this->getApplicationServiceLocator();
        $serviceManager->setAllowOverride(true);
        $serviceManager->setService('TeaBlog\Mapper\Post', $postMapperMock);
        $serviceManager->setService('TeaBlog\Mapper\Category', $categoryMapperMock);

        // Start test
        $this->dispatch('/blog/category/test-category');
        $this->assertResponseStatusCode(200);

        $this->assertModuleName('TeaBlog');
        $this->assertControllerName('TeaBlog\Controller\Post');
        $this->assertControllerClass('PostController');
        $this->assertMatchedRouteName('blog/category');
    }
}