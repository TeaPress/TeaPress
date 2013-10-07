<?php

namespace TeaBlogTest\Model;

use TeaBlog\Model\Post;
use PHPUnit_Framework_TestCase;

class PostTest extends PHPUnit_Framework_TestCase {

    protected $post_id;
    protected $title;
    protected $short_description;
    protected $description;
    protected $thumb;
    protected $url_key;
    protected $created_at;
    protected $updated_at;

    public function testPostInitialState() {
        $post = new Post();

        $this->assertNull(
                $post->getPostId(), '"post_id" should initially be null'
        );
        $this->assertNull(
                $post->getTitle(), '"title" should initially be null'
        );
        $this->assertNull(
                $post->getShortDescription(), '"short_description" should initially be null'
        );

        $this->assertNull(
                $post->getDescription(), '"description" should initially be null'
        );

        $this->assertNull(
                $post->getThumb(), '"thumb" should initially be null'
        );

        $this->assertNull(
                $post->getUrlKey(), '"url_key" should initially be null'
        );

        $this->assertNull(
                $post->getCreatedAt(), '"created_at" should initially be null'
        );

        $this->assertNull(
                $post->getUpdatedAt(), '"updated_at" should initially be null'
        );
    }

    public function testCanSetAllProperties() 
    {
        $post = new Post();

        $data = array('post_id' => 1,
            'title' => 'test',
            'short_description' => 'short description',
            'description' => 'description',
            'thumb' => 'thumb',
            'url_key' => 'test-category',
            'created_at' => '2013-09-25 00:00:00',
            'updated_at' => '2013-09-25 00:00:00');

        $post->setPostId($data['post_id']);
        $post->setTitle($data['title']);
        $post->setShortDescription($data['short_description']);
        $post->setDescription($data['description']);
        $post->setThumb($data['thumb']);
        $post->setCreatedAt($data['created_at']);
        $post->setUpdatedAt($data['updated_at']);

        $this->assertSame(
                $data['post_id'], $post->getPostId(), '"post_id" was not set correctly'
        );
        $this->assertSame(
                $data['title'], $post->getTitle(), '"title" was not set correctly'
        );
        $this->assertSame(
                $data['short_description'], $post->getShortDescription(), '"short_description" was not set correctly'
        );
        $this->assertSame(
                $data['description'], $post->getDescription(), '"description" was not set correctly'
        );
        $this->assertSame(
                $data['thumb'], $post->getThumb(), '"thumb" was not set correctly'
        );
        $this->assertSame(
                $data['url_key'], $post->getUrlKey(), '"url_key" was not set correctly'
        );
        $this->assertSame(
                $data['created_at'], $post->getCreatedAt(), '"created_at" was not set correctly'
        );
        $this->assertSame(
                $data['updated_at'], $post->getUpdatedAt(), '"updated_at" was not set correctly'
        );
    }

    public function testExchangeArraySetsPropertiesCorrectly() {
        $post = new Post();
        $data = array('post_id' => 1,
            'title' => 'test',
            'short_description' => 'short description',
            'description' => 'description',
            'thumb' => 'thumb',
            'url_key' => 'test-category',
            'created_at' => '2013-09-25 00:00:00',
            'updated_at' => '2013-09-25 00:00:00');

        $post->exchangeArray($data);

        $this->assertSame(
                $data['post_id'], $post->getPostId(), '"post_id" was not set correctly'
        );
        $this->assertSame(
                $data['title'], $post->getTitle(), '"title" was not set correctly'
        );
        $this->assertSame(
                $data['short_description'], $post->getShortDescription(), '"short_description" was not set correctly'
        );
        $this->assertSame(
                $data['description'], $post->getDescription(), '"description" was not set correctly'
        );
        $this->assertSame(
                $data['thumb'], $post->getThumb(), '"thumb" was not set correctly'
        );
        $this->assertSame(
                $data['url_key'], $post->getUrlKey(), '"url_key" was not set correctly'
        );
        $this->assertSame(
                $data['created_at'], $post->getCreatedAt(), '"created_at" was not set correctly'
        );
        $this->assertSame(
                $data['updated_at'], $post->getUpdatedAt(), '"updated_at" was not set correctly'
        );
    }

    public function testExchangeArraySetsPropertiesToNullIfKeysAreNotPresent() {
        $post = new Post();

        $post->exchangeArray(array(
            'post_id' => 1,
            'title' => 'test',
            'short_description' => 'short description',
            'description' => 'description',
            'thumb' => 'thumb',
            'url_key' => 'test-category',
            'created_at' => '2013-09-25 00:00:00',
            'updated_at' => '2013-09-25 00:00:00'));
        $post->exchangeArray(array());

        $this->assertNull(
                $post->getPostId(), '"post_id" should have defaulted to null'
        );
        $this->assertNull(
                $post->getTitle(), '"title" should have defaulted to null'
        );
        $this->assertNull(
                $post->getShortDescription(), '"short_description" should have defaulted to null'
        );
        $this->assertNull(
                $post->getDescription(), '"description" should have defaulted to null'
        );
        $this->assertNull(
                $post->getThumb(), '"thumb" should have defaulted to null'
        );
        $this->assertNull(
                $post->getUrlKey(), '"url_key" should have defaulted to null'
        );
        $this->assertNull(
                $post->getCreatedAt(), '"created_at" should have defaulted to null'
        );
        $this->assertNull(
                $post->getUpdatedAt(), '"updated_at" should have defaulted to null'
        );
    }

    public function testGetArrayCopyReturnsAnArrayWithPropertyValues() {
        $post = new Post();
        $data = array(
            'post_id' => 1,
            'title' => 'test',
            'short_description' => 'short description',
            'description' => 'description',
            'thumb' => 'thumb',
            'url_key' => 'test-category',
            'created_at' => '2013-09-25 00:00:00',
            'updated_at' => '2013-09-25 00:00:00');

        $post->exchangeArray($data);
        $copyArray = $post->getArrayCopy();

        $this->assertSame(
                $data['post_id'], $copyArray['post_id'], '"post_id" was not set correctly'
        );
        $this->assertSame(
                $data['title'], $copyArray['title'], '"title" was not set correctly'
        );
        $this->assertSame(
                $data['short_description'], $copyArray['short_description'], '"short_description" was not set correctly'
        );
        $this->assertSame(
                $data['description'], $copyArray['description'], '"description" was not set correctly'
        );
        $this->assertSame(
                $data['thumb'], $copyArray['thumb'], '"thumb" was not set correctly'
        );
        $this->assertSame(
                $data['url_key'], $copyArray['url_key'], '"url_key" was not set correctly'
        );
        $this->assertSame(
                $data['created_at'], $copyArray['created_at'], '"created_at" was not set correctly'
        );
        $this->assertSame(
                $data['updated_at'], $copyArray['updated_at'], '"updated_at" was not set correctly'
        );
    }

}