<?php

namespace TeaBlog\Mapper;

use TakeATea\Mapper\AbstractMapper;
use Zend\Db\Sql\Expression;

class Category extends AbstractMapper
{
    /**
     * Get category by key id
     * @param int $category_id
     * @return TeaBlog\Model\Category
     */
    public function getCategoryById($category_id)
    {
        $select = $this->tableGateway->getSql()->select();
        $select->where('category_id = ' . $category_id);
        return $this->selectWith($select)->current();
    }
    
    /**
     * Get Category from url key.
     * @param string $name
     * @return TeaBlog\Model\Category
     */
    public function getCategoryFromSlug($name)
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
     * Get all category
     * @return \Zend\Db\ResultSet\ResultSet
     */
    public function getAllCategory()
    {
        $select = $this->tableGateway->getSql()->select();
        $select->order('category_id ASC, parent_id ASC');
        
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
    
    /**
     * Create or update a category
     * @param \TeaBlog\Model\Category $category
     * @return type
     */
    public function save(\TeaBlog\Model\Category $category)
    {
        $data = $category->toArray();
        
        if($category->getCategoryId() == null) {
            $data['created_at'] = new Expression('NOW()');
            return $this->tableGateway->insert($data);
        } else {
            $data['updated_at'] = new Expression('NOW()');
            return $this->tableGateway->update($data, 'category_id = ' . $category->getCategoryId());
        }
    }
}