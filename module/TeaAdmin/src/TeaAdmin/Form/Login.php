<?php

namespace TeaAdmin\Form;

use Zend\Form\Form;

class Login extends Form
{
    public function __construct()
    {
        parent::__construct();
        
        $username = new \Zend\Form\Element\Text('username');
        $username->setLabel('Username');
        $username->setAttribute('placeholder', 'Username');
        $username->setAttribute('autofocus', 'autofocus');
        $this->add($username);
        
        $password = new \Zend\Form\Element\Password('password');
        $password->setLabel('Password');
        $password->setAttribute('placeholder', 'Password');
        $this->add($password);
        
        $remember = new \Zend\Form\Element\Checkbox('remember');
        $remember->setLabel('Remember me');
        $this->add($remember);
        
        $token = new \Zend\Form\Element\Csrf('token');
        $this->add($token);
        
        $submit = new \Zend\Form\Element\Submit('submit');
        $submit->setValue('Sign in');
        $this->add($submit);
    }
}