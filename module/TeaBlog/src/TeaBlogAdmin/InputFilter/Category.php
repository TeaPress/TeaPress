<?php

namespace TeaBlogAdmin\InputFilter;

use TakeATea\InputFilter\AbstractInputFilter;

class Category extends AbstractInputFilter
{
    public function __construct()
    {
        $this->add(array(
            'name' => 'categoryId',
            'required' => true,
        ));

        $this->add(array(
            'name' => 'title',
            'required' => true,
        ));
        
        $this->add(array(
            'name' => 'urlKey',
            'required' => false,
        ));
        
        $this->add(array(
            'name' => 'description',
            'required' => false,
        ));
        
        $this->add(array(
            'name' => 'parentId',
            'required' => false,
        ));
        
        $this->add(array(
            'name' => 'isActive',
            'required' => true,
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