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
        $album = new Album();

        $album->exchangeArray(array('artist' => 'some artist',
                                    'id'     => 123,
                                    'title'  => 'some title'));
        $album->exchangeArray(array());

        $this->assertNull(
            $album->artist, '"artist" should have defaulted to null'
        );
        $this->assertNull(
            $album->id, '"id" should have defaulted to null'
        );
        $this->assertNull(
            $album->title, '"title" should have defaulted to null'
        );
    }

    public function testGetArrayCopyReturnsAnArrayWithPropertyValues()
    {
        $album = new Album();
        $data  = array('artist' => 'some artist',
                       'id'     => 123,
                       'title'  => 'some title');

        $album->exchangeArray($data);
        $copyArray = $album->getArrayCopy();

        $this->assertSame(
            $data['artist'],
            $copyArray['artist'],
            '"artist" was not set correctly'
        );
        $this->assertSame(
            $data['id'],
            $copyArray['id'],
            '"id" was not set correctly'
        );
        $this->assertSame(
            $data['title'],
            $copyArray['title'],
            '"title" was not set correctly'
        );
    }

    public function testInputFiltersAreSetCorrectly()
    {
        $album = new Album();

        $inputFilter = $album->getInputFilter();

        $this->assertSame(3, $inputFilter->count());
        $this->assertTrue($inputFilter->has('artist'));
        $this->assertTrue($inputFilter->has('id'));
        $this->assertTrue($inputFilter->has('title'));
    }
}