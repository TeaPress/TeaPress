<?php

namespace TeaBlog\Service;

use TakeATea\Service\AbstractService;

class Category extends AbstractService
{
    protected $mapper = 'TeaBlog\Mapper\Category';
    
    /**
     * Get category by key id
     * @param int $category_id
     * @return TeaBlog\Model\Category
     */
    public function getCategoryById($category_id)
    {
        $cache = $this->getServiceLocator()->get('TeaCacheBlog');
        $keyCache = 'blog_category_get_category_by_id_' . $category_id;
        
        if($cache->hasItem($keyCache)) {
            return $cache->getItem($keyCache);
        }
        
        $result = $this->getMapper()->getCategoryById($category_id);
        $cache->setItem($keyCache, $result);
        
        return $result;
    }
    
    /**
     * Get Category from url key.
     * @param string $name
     * @return TeaBlog\Model\Category
     */
    public function getCategoryFromUrlKey($name)
    {
        $cache = $this->getServiceLocator()->get('TeaCacheBlog');
        $keyCache = 'blog_category_get_category_from_url_key_' . $name;
        
        if($cache->hasItem($keyCache)) {
            return $cache->getItem($keyCache);
        }
        
        $result = $this->getMapper()->getCategoryFromUrlKey($name);
        $cache->setItem($keyCache, $result);
        
        return $result;
    }
    
    /**
     * Get all root category
     * @return \Zend\Db\ResultSet\ResultSet
     */
    public function getAllRootCategory($usePaginator = false)
    {
        $this->usePaginator($usePaginator);
        
        $cache = $this->getServiceLocator()->get('TeaCacheBlog');
        $keyCache = 'blog_category_get_all_root_category_paginator_' . $usePaginator;
        
        if($cache->getCaching() && $cache->hasItem($keyCache)) {
            return $cache->getItem($keyCache);
        }

        if($usePaginator) {
            $result = $this->getMapper()->getAllRootCategory();
        } else {
            $result = $this->getMapper()->getAllRootCategory()->toArray();
        }
        
        $cache->setItem($keyCache, $result);
        
        return $result;
    }
    
    /**
     * Get all category
     * @return \Zend\Db\ResultSet\ResultSet
     */
    public function getAllCategory($usePaginator = false)
    {
        $this->usePaginator($usePaginator);
        
        $cache = $this->getServiceLocator()->get('TeaCacheBlog');
        $keyCache = 'blog_category_get_all_category_paginator_' . $usePaginator;
        
        if($cache->getCaching() && $cache->hasItem($keyCache) && !$usePaginator) {
            return $cache->getItem($keyCache);
        }
        
        if($usePaginator) {
            $this->getMapper()->usePaginator($usePaginator);
            $result = $this->getMapper()->getAllCategory();
        } else {
            $result = $this->getMapper()->getAllCategory()->toArray();
             $cache->setItem($keyCache, $result);
        }
        
       
        
        return $result;
    }
    
    /**
     * Get full category ordered
     * @uses TeaCore\Cache blog_category_get_full_category
     * @return \Zend\Db\ResultSet\ResultSet
     */
    public function getFullCategory()
    {
        $cache = $this->getServiceLocator()->get('TeaCacheBlog');
        $keyCache = 'blog_category_get_full_category';
        
        if($cache->getCaching() && $cache->hasItem($keyCache)) {
            return $cache->getItem($keyCache);
        }
        
        $categorys = $this->getMapper()->getFullCategory();

        $result = array();
        foreach ($categorys as $category) {
            if($category->getParentId() == null) {
                $result[] = $category;
            } else {
                $found = false;
                foreach ($result as $parentCategory) {
                    if($category->getParentId() == $parentCategory->getCategoryId()) {
                        $parentCategory->addChildren($category);
                        $found = true;
                    }
                }
                if(!$found) {
                    throw new \Exception('Error in build full category : Cannot find parent of a category');
                }
            }
        }
        $cache->setItem($keyCache, $result);
        
        return $result;
    }
    
    /**
     * Create or update a category
     * @param \TeaBlog\Model\Category $category
     * @return type
     */
    public function save($category)
    {
        $cache = $this->getServiceLocator()->get('TeaCacheBlog');
        $cache->clearByPrefix('blog_category_');
        
        return $this->getMapper()->save($category);
    }
}