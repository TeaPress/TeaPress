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
        $username->setAttribute('autocomplete', 'off');
        $this->add($username);
        
        $firstname = new \Zend\Form\Element\Text('userFirstname');
        $firstname->setLabel('Firstname');
        $this->add($firstname);
        
        $lastname = new \Zend\Form\Element\Text('userLastname');
        $lastname->setLabel('Lastname');
        $this->add($lastname);
        
        $email = new \Zend\Form\Element\Email('userEmail');
        $email->setLabel('Email');
        $this->add($email);
        
        $content = new \Zend\Form\Element\Textarea('userContent');
        $content->setLabel('Content');
        $content->setAttribute('resize', 'none');
        $this->add($content);
        
        $google = new \Zend\Form\Element\Text('userGoogle');
        $google->setLabel('Google profile');
        $this->add($google);
        
        $facebook = new \Zend\Form\Element\Text('userFacebook');
        $facebook->setLabel('Facebook profile');
        $this->add($facebook);
        
        $twitter = new \Zend\Form\Element\Text('userTwitter');
        $twitter->setLabel('Twitter profile');
        $this->add($twitter);
        
        $status = new \Zend\Form\Element\Select('userStatus');
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
            $options[$item->getRoleId()] = $item->getRoleName();
        }
        $role->setValueOptions($options);
        $this->add($role);
        
        $password = new \Zend\Form\Element\Password('userPassword');
        $password->setLabel('Password');
        $password->setAttribute('autocomplete', 'off');
        $this->add($password);
        
        $confirm = new \Zend\Form\Element\Password('userConfirm');
        $confirm->setLabel('Confirm Password');
        $this->add($confirm);
        
        $submit = new \Zend\Form\Element\Submit('submit');
        $submit->setValue('Save');
        $this->add($submit);
    }
}