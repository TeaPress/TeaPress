<?php

namespace TeaBlog\Mapper;

use TakeATea\Mapper\AbstractMapper;

class Post extends AbstractMapper
{
    /**
     * Find post from slug parameter
     * @param string $slug
     * @return \TeaBlog\Model\Post | false
     */
    public function getPostBySlug($slug)
    {
        $select = $this->tableGateway->getSql()->select();
        $select->where("url_key = '" . $slug . "'");
        
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
        $select->order('post_created DESC');
        
        return $this->selectWith($select);
    }
    
    /**
     * Get posts from category's slug
     * @param string $slug
     * @return \Zend\Db\ResultSet\ResultSet
     */
    public function getPostsFromCategorySlug($slug)
    {
        $select = $this->tableGateway->getSql()->select();
        $select->join('blog_category', 'blog_category.category_id = blog_post.category_id', array());
        $select->where("blog_category.category_slug = '" . $slug . "'");
        $select->order('blog_post.category_created DESC');
        
        return $this->selectWith($select);
    }
    
    /**
     * Get all posts
     * @return \Zend\Db\ResultSet\ResultSet | Zend\Paginator\Paginator
     */
    public function getAllPosts()
    {
        $select = $this->tableGateway->getSql()->select();
        $select->order('post_created DESC');
        
        return $this->selectWith($select);
    }
}