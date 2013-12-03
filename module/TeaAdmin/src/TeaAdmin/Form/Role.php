<?php

namespace TeaAdmin\Form;

use TakeATea\Form\AbstractForm;
use Zend\Stdlib\Hydrator\ClassMethods as ClassMethodsHydrator;

class Role extends AbstractForm
{
    public function init()
    {
        parent::init();
        
        $this->setHydrator(new ClassMethodsHydrator(false))
             ->setObject(new \TeaAdmin\Model\Role());
        
        $name = new \Zend\Form\Element\Text('roleName');
        $name->setLabel('Name');
        $name->setAttribute('autofocus', 'autofocus');
        $this->add($name);
        
        $content = new \Zend\Form\Element\Textarea('roleContent');
        $content->setLabel('Content');
        $this->add($content);
        
        $submit = new \Zend\Form\Element\Submit('submit');
        $submit->setValue('Save');
        $this->add($submit);
    }
}