<?php

namespace TeaBlog\View\Helper;

use Zend\View\Helper\AbstractHelper;

class Latest extends AbstractHelper
{
    protected $postService;
    
    public function __invoke(array $options)
    {
        // TODO traiter les options
        // exemple : la possibilité d'afficher les latest d'une catégorie.
        
        $latest = $this->getPostService()->getLatestPosts();
        
        return $this->getView()->render('tea-blog/widget/latest', array('latest' => $latest));
    }
    
    public function getPostService() 
    {
        return $this->postService;
    }

    public function setPostService($postService) 
    {
        $this->postService = $postService;
    }
}