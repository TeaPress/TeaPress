<?php

namespace TeaBlog\Service;

use TakeATea\Service\AbstractService;

class Post extends AbstractService
{
    protected $mapper = 'TeaBlog\Mapper\Post';
    
    /**
     * Find post from slug parameter
     * @param int $slug
     * @return \TeaBlog\Model\Post | false
     */
    public function getPostById($id)
    {
        return $this->getMapper()->getPostById($id);
    }
    
    /**
     * Find post from slug parameter
     * @param string $slug
     * @return \TeaBlog\Model\Post | false
     */
    public function getPostBySlug($slug)
    {
        return $this->getMapper()->getPostBySlug($slug);
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
            $this->usePaginator($usePaginator);
        }
        return $this->getMapper()->getAllPosts();
    }
    
    /**
     * Get posts from category's slug
     * @param string $slug
     * @param boolean $usePaginator
     * @return \Zend\Db\ResultSet\ResultSet | Zend\Paginator\Paginator
     */
    public function getPostsFromCategorySlug($slug, $usePaginator = true)
    {
        if($usePaginator) {
            $this->usePaginator($usePaginator);
        }
        return $this->getMapper()->getPostsFromCategorySlug($slug);
    }
    
    /**
     * Create or update post
     * @param \TeaBlog\Model\Post $post
     */
    public function save($post)
    {
        $auth = $this->getServiceLocator()->get('TeaAdmin\Authentication\Service');
        if (!$auth->hasIdentity()) {
            throw new \Exception('No identity found.');
        }
        
        $post->setAuthorId($auth->getIdentity()->user_id);
        return $this->getMapper()->save($post);
    }
}