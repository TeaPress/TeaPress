<?php

namespace TeaBlog\Service;

use TakeATea\Service\AbstractService;

class Post extends AbstractService
{
    protected $mapper = 'TeaBlog\Mapper\Post';
    
    /**
     * Get post from column url_key
     * @param string $name
     * @return \TeaBlog\Model\Post
     */
    public function getPostByUrlKey($name)
    {
        return $this->getMapper()->getPostByUrlKey($name);
    }
    
    /**
     * Get latest posts
     * @return \Zend\Db\ResultSet\ResultSet
     */
    public function getLatestPosts()
    {
        $config = $this->getServiceLocator()->get('Config');
        $limit = $config['blog']['widget']['latest']['limit'];
        
        return $this->getMapper()->getLatestPosts($limit);
    }
    
    /**
     * Get all posts
     * @param boolean $usePaginator
     * @return \Zend\Db\ResultSet\ResultSet | Zend\Paginator\Paginator
     */
    public function getAllPosts($usePaginator = true)
    {
        if($usePaginator) {
            $this->usePaginator();
        }
        return $this->getMapper()->getAllPosts();
    }
    
    /**
     * Get posts from category url key
     * @param string $name
     * @param boolean $usePaginator
     * @return \Zend\Db\ResultSet\ResultSet | Zend\Paginator\Paginator
     */
    public function getPostsFromCategoryUrlKey($name, $usePaginator = true)
    {
        if($usePaginator) {
            $this->usePaginator();
        }
        return $this->getMapper()->getPostsFromCategoryUrlKey($name);
    }
}