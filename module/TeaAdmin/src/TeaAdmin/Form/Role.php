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
        
        $roleId = new \Zend\Form\Element\Hidden('roleId');
        $this->add($roleId);
        
        $name = new \Zend\Form\Element\Text('name');
        $name->setLabel('Name');
        $name->setAttribute('autofocus', 'autofocus');
        $this->add($name);
        
        $submit = new \Zend\Form\Element\Submit('submit');
        $submit->setValue('Save');
        $this->add($submit);
    }
}