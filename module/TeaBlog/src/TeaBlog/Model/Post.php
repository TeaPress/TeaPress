<?php

namespace TeaBlog\Model;

use TakeATea\Model\AbstractModel;

class Post extends AbstractModel
{
    protected $post_id;
    protected $author_id;
    protected $category_id;
    protected $post_title;
    protected $post_content;
    protected $post_excerpt;
    protected $post_slug;
    protected $post_tags;
    protected $post_visibility;
    protected $post_meta_title;
    protected $post_meta_description;
    protected $post_meta_keywords;
    protected $post_created;
    protected $post_updated;
    protected $post_published;
    
    public function getPostId() {
        return $this->post_id;
    }

    public function setPostId($post_id) {
        $this->post_id = $post_id;
    }
    
    public function getAuthorId() {
        return $this->author_id;
    }

    public function getCategoryId() {
        return $this->category_id;
    }

    public function getPostTitle() {
        return $this->post_title;
    }

    public function getPostContent() {
        return $this->post_content;
    }

    public function getPostExcerpt() {
        return $this->post_excerpt;
    }

    public function getPostSlug() {
        return $this->post_slug;
    }

    public function getPostTags() {
        return $this->post_tags;
    }

    public function getPostVisibility() {
        return $this->post_visibility;
    }

    public function getPostMetaTitle() {
        return $this->post_meta_title;
    }

    public function getPostMetaDescription() {
        return $this->post_meta_description;
    }

    public function getPostMetaKeywords() {
        return $this->post_meta_keywords;
    }

    public function getPostCreated() {
        return $this->post_created;
    }

    public function getPostUpdated() {
        return $this->post_updated;
    }

    public function getPostPublished() {
        return $this->post_published;
    }

    public function setAuthorId($author_id) {
        $this->author_id = $author_id;
    }

    public function setCategoryId($category_id) {
        $this->category_id = $category_id;
    }

    public function setPostTitle($post_title) {
        $this->post_title = $post_title;
    }

    public function setPostContent($post_content) {
        $this->post_content = $post_content;
    }

    public function setPostExcerpt($post_excerpt) {
        $this->post_excerpt = $post_excerpt;
    }

    public function setPostSlug($post_slug) {
        $this->post_slug = $post_slug;
    }

    public function setPostTags($post_tags) {
        $this->post_tags = $post_tags;
    }

    public function setPostVisibility($post_visibility) {
        $this->post_visibility = $post_visibility;
    }

    public function setPostMetaTitle($post_meta_title) {
        $this->post_meta_title = $post_meta_title;
    }

    public function setPostMetaDescription($post_meta_description) {
        $this->post_meta_description = $post_meta_description;
    }

    public function setPostMetaKeywords($post_meta_keywords) {
        $this->post_meta_keywords = $post_meta_keywords;
    }

    public function setPostCreated($post_created) {
        $this->post_created = $post_created;
    }

    public function setPostUpdated($post_updated) {
        $this->post_updated = $post_updated;
    }

    public function setPostPublished($post_published) {
        $this->post_published = $post_published;
    }
}