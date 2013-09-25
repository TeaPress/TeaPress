<?php

namespace TeaBlog\View\Helper;

use Zend\View\Helper\AbstractHelper;

class Category extends AbstractHelper
{
    protected $serviceLocator;
    
    public function __invoke($options = array())
    {
        if(!isset($options['display'])) {
            $options['display'] = 'root';
        }
        
        switch($options['display']) {
            case 'full':
                $list = $this->getServiceLocator()->get('TeaBlog\Service\Category')->getFullCategory();
                break;
            case 'root':
                $list = $this->getServiceLocator()->get('TeaBlog\Service\Category')->getAllRootCategory();
                break;
        }
        
        return $this->getView()->render('tea-blog/widget/category', array('list' => $list));
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