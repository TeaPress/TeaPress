<?php

namespace TeaBlogAdmin\InputFilter;

use TakeATea\InputFilter\AbstractInputFilter;

class Post extends AbstractInputFilter
{
    public function __construct()
    {
        $this->add(array(
            'name' => 'postId',
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
            'required' => true,
        ));
        
        $this->add(array(
            'name' => 'categoryId',
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