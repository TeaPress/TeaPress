<?php

namespace TeaAdmin\Form;

use TakeATea\Form\AbstractForm;
use Zend\Stdlib\Hydrator\ClassMethods as ClassMethodsHydrator;

class User extends AbstractForm
{
    public function init()
    {
        parent::init();
        
        $this->setHydrator(new ClassMethodsHydrator(false))
             ->setObject(new \TeaAdmin\Model\User());
        
        $username = new \Zend\Form\Element\Text('username');
        $username->setLabel('Username');
        $username->setAttribute('autofocus', 'autofocus');
        $this->add($username);
        
        $firstname = new \Zend\Form\Element\Text('firstname');
        $firstname->setLabel('Firstname');
        $this->add($firstname);
        
        $lastname = new \Zend\Form\Element\Text('lastname');
        $lastname->setLabel('Lastname');
        $this->add($lastname);
        
        $email = new \Zend\Form\Element\Email('email');
        $email->setLabel('Email');
        $this->add($email);
        
        $status = new \Zend\Form\Element\Select('status');
        $status->setLabel('Status');
        $status->setValueOptions(array(
            '1' => 'Active',
            '0' => 'Inactive'
        ));
        $this->add($status);
        
        $role = new \Zend\Form\Element\Select('roleId');
        $role->setLabel('Role');
        
        $roles = $this->getServiceLocator()->getServiceLocator()->get('TeaAdmin/Service/Role')->getAllRoles();
        $options = array();
        foreach ($roles as $item) {
            $options[$item->getRoleId()] = $item->getName();
        }
        $role->setValueOptions($options);
        $this->add($role);
        
        $password = new \Zend\Form\Element\Password('password');
        $password->setLabel('Password');
        $this->add($password);
        
        $confirm = new \Zend\Form\Element\Password('confirm');
        $confirm->setLabel('Confirm Password');
        $this->add($confirm);
        
        $submit = new \Zend\Form\Element\Submit('submit');
        $submit->setValue('Save');
        $this->add($submit);
    }
}