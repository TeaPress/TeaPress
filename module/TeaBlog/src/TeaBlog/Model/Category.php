<?php

namespace TeaBlog\Model;

use TakeATea\Model\AbstractModel;

class Category extends AbstractModel
{
    protected $category_id;
    protected $parent_id;
    protected $category_title;
    protected $category_content;
    protected $category_slug;
    protected $category_meta_title;
    protected $category_meta_description;
    protected $category_meta_keywords;
    protected $category_visibility;
    protected $category_created;
    protected $category_updated;
    
    public function getCategoryId() {
        return $this->category_id;
    }

    public function setCategoryId($category_id) {
        $this->category_id = $category_id;
    }
    
    public function getParentId() {
        return $this->parent_id;
    }

    public function setParentId($parent_id) {
        $this->parent_id = $parent_id;
    }

    public function getCategoryTitle() {
        return $this->category_title;
    }
    
    public function getCategoryContent() {
        return $this->category_content;
    }

    public function getCategorySlug() {
        return $this->category_slug;
    }

    public function getCategoryMetaTitle() {
        return $this->category_meta_title;
    }

    public function getCategoryMetaDescription() {
        return $this->category_meta_description;
    }

    public function getCategoryMetaKeywords() {
        return $this->category_meta_keywords;
    }

    public function getCategoryVisibility() {
        return $this->category_visibility;
    }

    public function getCategoryCreated() {
        return $this->category_created;
    }
    
    public function getCategoryUpdated() {
        return $this->category_updated;
    }

    public function setCategoryTitle($category_title) {
        $this->category_title = $category_title;
        return $this;
    }
    
    public function setCategoryContent($category_content) {
        $this->category_content = $category_content;
        return $this;
    }

    public function setCategorySlug($category_slug) {
        $this->category_slug = $category_slug;
        return $this;
    }

    public function setCategoryMetaTitle($category_meta_title) {
        $this->category_meta_title = $category_meta_title;
        return $this;
    }

    public function setCategoryMetaDescription($category_meta_description) {
        $this->category_meta_description = $category_meta_description;
        return $this;
    }

    public function setCategoryMetaKeywords($category_meta_keywords) {
        $this->category_meta_keywords = $category_meta_keywords;
        return $this;
    }

    public function setCategoryVisibility($category_visibility) {
        $this->category_visibility = $category_visibility;
        return $this;
    }

    public function setCategoryCreated($category_created) {
        $this->category_created = $category_created;
        return $this;
    }
    
    public function setCategoryUpdated($category_updated) {
        $this->category_updated = $category_updated;
        return $this;
    }
}