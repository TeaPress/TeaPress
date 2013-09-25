<?php

namespace TeaBlog\Model;

use TakeATea\Model\AbstractModel;

class Category extends AbstractModel
{
    protected $category_id;
    protected $title;
    protected $url_key;
    protected $created_at;
    protected $updated_at;
    
    public function getCategoryId() {
        return $this->category_id;
    }

    public function setCategoryId($category_id) {
        $this->category_id = $category_id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function getUrlKey() {
        return $this->url_key;
    }

    public function setUrlKey($url_key) {
        $this->url_key = $url_key;
    }

    public function getCreatedAt() {
        return $this->created_at;
    }

    public function setCreatedAt($created_at) {
        $this->created_at = $created_at;
    }

    public function getUpdatedAt() {
        return $this->updated_at;
    }

    public function setUpdatedAt($updated_at) {
        $this->updated_at = $updated_at;
    }
}