<?php

namespace TeaBlogAdmin\Form;

use TakeATea\Form\AbstractForm;
use Zend\Stdlib\Hydrator\ClassMethods as ClassMethodsHydrator;

class Post extends AbstractForm
{
    public function init()
    {
        parent::init();
        
        $this->setHydrator(new ClassMethodsHydrator(false))
             ->setObject(new \TeaBlog\Model\Post());
        
        $postId = new \Zend\Form\Element\Hidden('postId');
        $this->add($postId);
        
        $title = new \Zend\Form\Element\Text('title');
        $title->setLabel('Title');
        $this->add($title);
        
        $urlKey = new \Zend\Form\Element\Text('urlKey');
        $urlKey->setLabel('Url Key');
        $this->add($urlKey);
        
        $description = new \Zend\Form\Element\Textarea('description');
        $description->setLabel('Description');
        $this->add($description);
        
        $category = new \Zend\Form\Element\Select('categoryId');
        $category->setLabel('Category');
        
        // Get root category for parent category
        $rootCategorys = $this->getServiceLocator()->getServiceLocator()->get('TeaBlog\Service\Category')->getAllRootCategory();
        $options = array();
        foreach($rootCategorys as $rootCategory) {
            $options[$rootCategory->getCategoryId()] = $rootCategory->getTitle();
        }
        $category->setEmptyOption('Select a category');
        $category->setValueOptions($options);
        $this->add($category);
        
        $submit = new \Zend\Form\Element\Submit('submit');
        $submit->setValue('Save');
        $this->add($submit);
    }
}