<?php

namespace TeaBlog\View\Helper;

use Zend\View\Helper\AbstractHelper;

class Latest extends AbstractHelper
{
    protected $serviceLocator;
    
    public function __invoke(array $options)
    {
        //TODO traiter les options
        // exemple : la possibilité d'afficher les latest d'une catégorie.
        
        $latest = $this->getServiceLocator()->get('TeaBlog\Service\Post')->getLatestPosts();
        
        return $this->getView()->render('tea-blog/widget/latest', array('latest' => $latest));
    }
    
    public function getServiceLocator() 
    {
        return $this->serviceLocator;
    }

    public function setServiceLocator($serviceLocator) 
    {
        $this->serviceLocator = $serviceLocator;
    }
}