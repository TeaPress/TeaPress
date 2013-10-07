<?php
namespace TeaBlogTest\Model;

use TeaBlog\Model\Category;
use PHPUnit_Framework_TestCase;

class CategoryTest extends PHPUnit_Framework_TestCase
{
    public function testCategoryInitialState()
    {
        $category = new Category();

        $this->assertNull(
            $category->getCategoryId(),
            '"category_id" should initially be null'
        );
        $this->assertNull(
            $category->getTitle(),
            '"title" should initially be null'
        );
        $this->assertNull(
            $category->getUrlKey(),
            '"url_key" should initially be null'
        );
        
        $this->assertNull(
            $category->getCreatedAt(),
            '"created_at" should initially be null'
        );
        
        $this->assertNull(
            $category->getUpdatedAt(),
            '"updated_at" should initially be null'
        );
    }
    
    public function testCanSetAllProperties() 
    {
        $category = new Category();
        $data  = array('category_id' => 1,
                       'title'       => 'test',
                       'url_key'     => 'test-category',
                       'created_at'  => '2013-09-25 00:00:00',
                       'updated_at'  => '2013-09-25 00:00:00');
        
        $category->setCategoryId($data['category_id']);
        $category->setTitle($data['title']);
        $category->setUrlKey($data['url_key']);
        $category->setCreatedAt($data['created_at']);
        $category->setUpdatedAt($data['updated_at']);
        
        $this->assertSame(
            $data['category_id'],
            $category->getCategoryId(),
            '"category_id" was not set correctly'
        );
        $this->assertSame(
            $data['title'],
            $category->getTitle(),
            '"title" was not set correctly'
        );
        $this->assertSame(
            $data['url_key'],
            $category->getUrlKey(),
            '"url_key" was not set correctly'
        );
        $this->assertSame(
            $data['created_at'],
            $category->getCreatedAt(),
            '"created_at" was not set correctly'
        );
        $this->assertSame(
            $data['updated_at'],
            $category->getUpdatedAt(),
            '"updated_at" was not set correctly'
        );
    }

    public function testExchangeArraySetsPropertiesCorrectly()
    {
        $category = new Category();
        $data  = array('category_id' => 1,
                       'title'       => 'test',
                       'url_key'     => 'test-category',
                       'created_at'  => '2013-09-25 00:00:00',
                       'updated_at'  => '2013-09-25 00:00:00');

        $category->exchangeArray($data);

        $this->assertSame(
            $data['category_id'],
            $category->getCategoryId(),
            '"category_id" was not set correctly'
        );
        $this->assertSame(
            $data['title'],
            $category->getTitle(),
            '"title" was not set correctly'
        );
        $this->assertSame(
            $data['url_key'],
            $category->getUrlKey(),
            '"url_key" was not set correctly'
        );
        $this->assertSame(
            $data['created_at'],
            $category->getCreatedAt(),
            '"created_at" was not set correctly'
        );
        $this->assertSame(
            $data['updated_at'],
            $category->getUpdatedAt(),
            '"updated_at" was not set correctly'
        );
    }

    public function testExchangeArraySetsPropertiesToNullIfKeysAreNotPresent()
    {
        $category = new Category();

        $category->exchangeArray(array(
            'category_id' => 1,
            'title'       => 'test',
            'url_key'     => 'test-category',
            'created_at'  => '2013-09-25 00:00:00',
            'updated_at'  => '2013-09-25 00:00:00'));
        $category->exchangeArray(array());

        $this->assertNull(
            $category->getCategoryId(), '"category_id" should have defaulted to null'
        );
        $this->assertNull(
            $category->getTitle(), '"title" should have defaulted to null'
        );
        $this->assertNull(
            $category->getUrlKey(), '"url_key" should have defaulted to null'
        );
        $this->assertNull(
            $category->getCreatedAt(), '"created_at" should have defaulted to null'
        );
        $this->assertNull(
            $category->getUpdatedAt(), '"updated_at" should have defaulted to null'
        );
    }

    public function testGetArrayCopyReturnsAnArrayWithPropertyValues()
    {
        $category = new Category();
        $data  = array(
            'category_id' => 1,
            'title'       => 'test',
            'url_key'     => 'test-category',
            'created_at'  => '2013-09-25 00:00:00',
            'updated_at'  => '2013-09-25 00:00:00');

        $category->exchangeArray($data);
        $copyArray = $category->getArrayCopy();

        $this->assertSame(
            $data['category_id'],
            $copyArray['category_id'],
            '"category_id" was not set correctly'
        );
        $this->assertSame(
            $data['title'],
            $copyArray['title'],
            '"title" was not set correctly'
        );
        $this->assertSame(
            $data['url_key'],
            $copyArray['url_key'],
            '"url_key" was not set correctly'
        );
        $this->assertSame(
            $data['created_at'],
            $copyArray['created_at'],
            '"created_at" was not set correctly'
        );
        $this->assertSame(
            $data['updated_at'],
            $copyArray['updated_at'],
            '"updated_at" was not set correctly'
        );
    }
}