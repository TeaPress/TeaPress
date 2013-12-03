<?php

namespace TeaBlog\Model\Post;

use TeaBlog\Model\Post;

class Relational extends Post
{
    protected $author;
    protected $category;
    
    public function getAuthor() {
        return $this->author;
    }

    public function getCategory() {
        return $this->category;
    }

    public function setAuthor($author) {
        $this->author = $author;
    }

    public function setCategory($category) {
        $this->category = $category;
    }
    
    public function exchangeArray(array $data) {
        parent::exchangeArray($data);
        
        $this->author = new \TeaAdmin\Model\User();
        $this->author->exchangeArray($data);
        
        $this->category = new \TeaBlog\Model\Category();
        $this->category->exchangeArray($data);
        
        return $this;
    }
    
    public function toArray() {
        $vars = parent::toArray();
        unset($vars['author']);
        unset($vars['category']);
        
        return $vars;
    }
}