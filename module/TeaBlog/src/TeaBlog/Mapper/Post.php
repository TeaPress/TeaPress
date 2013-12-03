<?php

namespace TeaBlog\Mapper;

use TakeATea\Mapper\AbstractMapper;

class Post extends AbstractMapper
{
    /**
     * Find post by id
     * @param int $id
     * @return \TeaBlog\Model\Post | false
     */
    public function getPostById($id)
    {
        $select = $this->tableGateway->getSql()->select();
        $select->where('post_id = ' . $id);
        
        return $this->selectWith($select)->current();
    }
    
    /**
     * Find post from slug parameter
     * @param string $slug
     * @return \TeaBlog\Model\Post | false
     */
    public function getPostBySlug($slug)
    {
        $select = $this->tableGateway->getSql()->select();
        $select->where("post_slug = '" . $slug . "'");
        
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
        $select->join('blog_category', 'blog_category.category_id = blog_post.category_id', array('category_title'));
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
        $select->join('admin_user', 'admin_user.user_id = blog_post.author_id', array('username'));
        $select->join('blog_category', 'blog_category.category_id = blog_post.category_id', array('category_title'));
        $select->order('post_created DESC');
        
        return $this->selectWith($select);
    }
    
    public function save($post)
    {
        $data = $post->toArray();
        if($post->getPostId() !== null) {
            $data['post_updated'] = new \Zend\Db\Sql\Expression('Now()');
            return $this->tableGateway->update($data, 'post_id = ' . $post->getPostId());
        }
        
        $data['post_created'] = new \Zend\Db\Sql\Expression('Now()');
        $data['post_updated'] = new \Zend\Db\Sql\Expression('Now()');
        return $this->tableGateway->insert($data);
    }
}