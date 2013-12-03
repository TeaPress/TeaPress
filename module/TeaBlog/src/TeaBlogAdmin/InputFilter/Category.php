<?php

namespace TeaBlogAdmin\InputFilter;

use TakeATea\InputFilter\AbstractInputFilter;

class Category extends AbstractInputFilter
{
    public function __construct()
    {
        $this->add(array(
            'name' => 'categoryTitle',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'Zend\Validator\Db\NoRecordExists',
                    'options' => array(
                        'table' => 'blog_category',
                        'field' => 'category_title',
                        'adapter' => \Zend\Db\TableGateway\Feature\GlobalAdapterFeature::getStaticAdapter()
                    )
                ),
                array(
                    'name' => 'Zend\Validator\StringLength',
                    'options' => array(
                        'max' => 140
                    )
                )
            )
        ));
        
        $this->add(array(
            'name' => 'categorySlug',
            'required' => false,
            'validators' => array(
                array(
                    'name' => 'Zend\Validator\Db\NoRecordExists',
                    'options' => array(
                        'table' => 'blog_category',
                        'field' => 'category_slug',
                        'adapter' => \Zend\Db\TableGateway\Feature\GlobalAdapterFeature::getStaticAdapter()
                    )
                ),
                array(
                    'name' => 'Zend\Validator\StringLength',
                    'options' => array(
                        'max' => 250
                    )
                )
            ),
            'filters' => array(
                array(
                    'name' => 'TeaAdmin\Filter\Slug',
                    'options' => array()
                )
            )
        ));
        
        $this->add(array(
            'name' => 'categoryContent',
            'required' => false,
        ));
        
        $this->add(array(
            'name' => 'postThumb',
            'required' => false,
        ));
        
        $this->add(array(
            'name' => 'categoryMetaTitle',
            'required' => false,
            'validators' => array(
                array(
                    'name' => 'Zend\Validator\StringLength',
                    'options' => array(
                        'max' => 70
                    )
                )
            )
        ));
        
        $this->add(array(
            'name' => 'categoryMetaDescription',
            'required' => false,
            'validators' => array(
                array(
                    'name' => 'Zend\Validator\StringLength',
                    'options' => array(
                        'max' => 160
                    )
                )
            )
        ));
        
        $this->add(array(
            'name' => 'categoryMetaKeywords',
            'required' => false,
        ));
        
        $this->add(array(
            'name' => 'categoryVisibility',
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