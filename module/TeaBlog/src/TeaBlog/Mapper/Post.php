<?php

namespace TeaBlog\Mapper;

use TakeATea\Mapper\AbstractMapper;

class Post extends AbstractMapper
{
    /**
     * Get post from column url_key
     * @param string $name
     * @return \TeaBlog\Model\Post
     */
    public function getPostByUrlKey($name)
    {
        $select = $this->tableGateway->getSql()->select();
        $select->where("url_key = '$name'");
        $select->order('created_at DESC');
        
        return $this->selectWith($select)->current();
    }
    
    /**
     * Get latest posts with limit
     * @param int $limit
     * @return \Zend\Db\ResultSet\ResultSet
     */
    public function getLatestPosts($limit)
    {
        $select = $this->tableGateway->getSql()->select();
        $select->limit($limit);
        $select->order('created_at DESC');
        
        return $this->selectWith($select);
    }
    
    /**
     * Get posts from category url key
     * @param string $name
     * @return \Zend\Db\ResultSet\ResultSet
     */
    public function getPostsFromCategoryUrlKey($name)
    {
        $select = $this->tableGateway->getSql()->select();
        $select->join('blog_category', 'blog_category.category_id = blog_post.category_id', array());
        $select->where("blog_category.url_key = '$name'");
        $select->order('blog_post.created_at DESC');
        
        return $this->selectWith($select);
    }
    
    /**
     * Get all posts
     * @param boolean $usePaginator
     * @return \Zend\Db\ResultSet\ResultSet | Zend\Paginator\Paginator
     */
    public function getAllPosts()
    {
        $select = $this->tableGateway->getSql()->select();
        $select->order('created_at DESC');
        
        return $this->selectWith($select);
    }
}