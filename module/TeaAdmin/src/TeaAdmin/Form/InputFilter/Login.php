<?php

namespace TeaAdmin\Form\InputFilter;

use Zend\InputFilter\InputFilter;

class Login extends InputFilter
{
    public function __construct()
    {
        $this->add(array(
            'name' => 'username',
            'required' => true,
        ));

        $this->add(array(
            'name' => 'password',
            'required' => true,
        ));
        
        $this->add(array(
            'name' => 'remember',
            'required' => false,
        ));
        
        $this->add(array(
            'name' => 'token',
            'required' => true,
        ));

        $this->add(array(
            'name' => 'submit',
            'required' => false,
        ));
    }
}