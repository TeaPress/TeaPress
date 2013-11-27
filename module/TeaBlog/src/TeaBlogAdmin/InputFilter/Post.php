<?php

namespace TeaBlogAdmin\InputFilter;

use TakeATea\InputFilter\AbstractInputFilter;

class Post extends AbstractInputFilter
{
    public function __construct()
    {
        $this->add(array(
            'name' => 'postTitle',
            'required' => true,
        ));
        
        $this->add(array(
            'name' => 'postSlug',
            'required' => false,
            'validators' => array(
                array(
                    'name' => 'Zend\Validator\Db\NoRecordExists',
                    'options' => array(
                        'table' => 'post',
                        'field' => 'post_slug',
                        'adapter' => \Zend\Db\TableGateway\Feature\GlobalAdapterFeature::getStaticAdapter()
                    )
                )
            ),
            'filters' => array(
                array(
                    'name' => 'Zend\Filter\StringToLower',
                ),
                array(
                    'name' => 'Zend\Filter\Word\SeparatorToDash',
                )
            )
        ));
        
        $this->add(array(
            'name' => 'postContent',
            'required' => true,
        ));
        
        $this->add(array(
            'name' => 'postExcerpt',
            'required' => false,
        ));
        
        $this->add(array(
            'name' => 'postThumb',
            'required' => false,
        ));
        
        $this->add(array(
            'name' => 'categoryId',
            'required' => true,
        ));
        
        $this->add(array(
            'name' => 'postTags',
            'required' => false,
        ));
        
        $this->add(array(
            'name' => 'postMetaTitle',
            'required' => false,
        ));
        
        $this->add(array(
            'name' => 'postMetaDescription',
            'required' => false,
        ));
        
        $this->add(array(
            'name' => 'postMetaKeywords',
            'required' => false,
        ));
        
        $this->add(array(
            'name' => 'postVisibility',
            'required' => true,
        ));
        
        $this->add(array(
            'name' => 'postComment',
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