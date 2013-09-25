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
     * Get full category ordered
     * @return \Zend\Db\ResultSet\ResultSet
     */
    public function getFullCategory()
    {
        $categorys = $this->getMapper()->getFullCategory();
    }
}