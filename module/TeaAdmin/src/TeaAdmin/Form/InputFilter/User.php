<?php

namespace TeaAdmin\Form\InputFilter;

use TakeATea\InputFilter\AbstractInputFilter;

class User extends AbstractInputFilter
{
    public function __construct()
    {
        $this->add(array(
            'name' => 'username',
            'required' => true,
        ));
        
        $this->add(array(
            'name' => 'firstname',
            'required' => true,
        ));
        
        $this->add(array(
            'name' => 'lastname',
            'required' => true,
        ));
        
        $this->add(array(
            'name' => 'email',
            'required' => true,
        ));
        
        $this->add(array(
            'name' => 'roleId',
            'required' => true,
        ));
        
        $this->add(array(
            'name' => 'status',
            'required' => true,
        ));

        $this->add(array(
            'name' => 'password',
            'required' => true,
        ));
        
        $this->add(array(
            'name' => 'confirm',
            'required' => true,
        ));
        
        
    }
}