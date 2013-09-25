<?php

namespace TeaBlog\Model;

use TakeATea\Model\AbstractModel;

class Post extends AbstractModel
{
    protected $post_id;
    protected $title;
    protected $short_description;
    protected $description;
    protected $thumb;
    protected $url_key;
    protected $created_at;
    protected $updated_at;
    
    public function getPostId() {
        return $this->post_id;
    }

    public function setPostId($post_id) {
        $this->post_id = $post_id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function getShortDescription() {
        return $this->short_description;
    }

    public function setShortDescription($short_description) {
        $this->short_description = $short_description;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function getThumb() {
        return $this->thumb;
    }

    public function setThumb($thumb) {
        $this->thumb = $thumb;
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