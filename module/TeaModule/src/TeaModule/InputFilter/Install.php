<?php

namespace TeaModule\InputFilter;

use TakeATea\InputFilter\AbstractInputFilter;

class Install extends AbstractInputFilter
{
    public function __construct()
    {
        $file = new \Zend\InputFilter\FileInput('file');
        $file->setRequired(true);
        $file->getFilterChain()->attachByName(
            'filerenameupload',
            array(
                'target' => './uploads/',
                'overwrite' => true,
                'use_upload_name' => true,
            )
        );
//        $file->getValidatorChain()->attachByName(
//            'fileextension',
//            array(
//                'extension' => 'phar'
//            )
//        );
                
        $this->add($file);
    }
}