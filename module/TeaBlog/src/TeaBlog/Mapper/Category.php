<?php

namespace TeaBlog\Mapper;

use TakeATea\Mapper\AbstractMapper;

class Category extends AbstractMapper
{
    /**
     * Get Category from url key.
     * @param string $name
     * @return TeaBlog\Model\Category
     */
    public function getCategoryFromUrlKey($name)
    {
        $select = $this->tableGateway->getSql()->select();
        $select->where("url_key = '$name'");
        
        return $this->selectWith($select)->current();
    }
    
    /**
     * Get all root category
     * @return \Zend\Db\ResultSet\ResultSet
     */
    public function getAllRootCategory()
    {
        $select = $this->tableGateway->getSql()->select();
        $select->where('parent_id IS NULL');
        $select->order('title ASC');
        
        return $this->selectWith($select);
    }
    
    /**
     * Get full category ordered
     * @return \Zend\Db\ResultSet\ResultSet
     */
    public function getFullCategory()
    {
        $select = $this->tableGateway->getSql()->select();
        $select->order('category_id ASC, parent_id ASC');
        
        return $this->selectWith($select);
    }
}