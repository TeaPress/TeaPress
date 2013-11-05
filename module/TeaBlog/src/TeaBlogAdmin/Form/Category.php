<?php

namespace TeaBlogAdmin\Form;

use TakeATea\Form\AbstractForm;
use Zend\Stdlib\Hydrator\ClassMethods as ClassMethodsHydrator;

class Category extends AbstractForm
{
    public function init()
    {
        parent::init();
        
        $this->setHydrator(new ClassMethodsHydrator(false))
             ->setObject(new \TeaBlog\Model\Category());
        
        $categoryId = new \Zend\Form\Element\Hidden('categoryId');
        $this->add($categoryId);
        
        $title = new \Zend\Form\Element\Text('title');
        $title->setLabel('Title');
        $this->add($title);
        
        $urlKey = new \Zend\Form\Element\Text('urlKey');
        $urlKey->setLabel('Url Key');
        $this->add($urlKey);
        
        $description = new \Zend\Form\Element\Textarea('description');
        $description->setLabel('Description');
        $this->add($description);
        
        $parent = new \Zend\Form\Element\Select('parentId');
        $parent->setLabel('Parent');
        
        // Get root category for parent category
        $rootCategorys = $this->getServiceLocator()->getServiceLocator()->get('TeaBlog\Service\Category')->getAllRootCategory();
        $options = array();
        foreach($rootCategorys as $rootCategory) {
            $options[$rootCategory->getCategoryId()] = $rootCategory->getTitle();
        }
        $parent->setEmptyOption('Select parent category');
        $parent->setValueOptions($options);
        $this->add($parent);
        
        $submit = new \Zend\Form\Element\Submit('submit');
        $submit->setValue('Save');
        $this->add($submit);
    }
}