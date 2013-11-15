<?php

namespace TeaBlog\View\Helper;

use Zend\View\Helper\AbstractHelper;

class Category extends AbstractHelper
{
    protected $categoryService;
    
    public function __invoke($options = array())
    {
        if(!isset($options['display'])) {
            $options['display'] = 'root';
        }
        
        switch($options['display']) {
            case 'full':
                $list = $this->getCategoryService()->getFullCategory();
                break;
            case 'root':
                $list = $this->getCategoryService()->getAllRootCategory(false);
                break;
        }
        
        return $this->getView()->render('tea-blog/widget/category', array('list' => $list));
    }
    
    public function getCategoryService() 
    {
        return $this->categoryService;
    }

    public function setCategoryService($categoryService) 
    {
        $this->categoryService = $categoryService;
    }
}