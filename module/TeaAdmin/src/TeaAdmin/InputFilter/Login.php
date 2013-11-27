<?php

namespace TeaAdmin\InputFilter;

use TakeATea\InputFilter\AbstractInputFilter;

class Login extends AbstractInputFilter
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