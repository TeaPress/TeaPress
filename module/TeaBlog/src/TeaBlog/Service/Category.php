<?php

namespace TeaBlog\Service;

use TakeATea\Service\AbstractService;

class Category extends AbstractService
{
    protected $mapper = 'TeaBlog\Mapper\Category';
    
    /**
     * Get Category from url key.
     * @param string $name
     * @return TeaBlog\Model\Category
     */
    public function getCategoryFromUrlKey($name)
    {
        return $this->getMapper()->getCategoryFromUrlKey($name);
    }
    
    /**
     * Get all root category
     * @return \Zend\Db\ResultSet\ResultSet
     */
    public function getAllRootCategory()
    {
        return $this->getMapper()->getAllRootCategory();
    }
    
    /**
     * Get all category
     * @return \Zend\Db\ResultSet\ResultSet
     */
    public function getAllCategory()
    {
        return $this->getMapper()->getAllCategory();
    }
    
    /**
     * Get full category ordered
     * @return \Zend\Db\ResultSet\ResultSet
     */
    public function getFullCategory()
    {
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
        
        return $result;
    }
}