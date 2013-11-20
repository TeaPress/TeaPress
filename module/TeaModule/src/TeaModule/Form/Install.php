<?php
namespace TeaModule\Form;

use TakeATea\Form\AbstractForm;

class Install extends AbstractForm
{
    public function init()
    {
        parent::init();
        
        $file = new \Zend\Form\Element\File('file');
        $file->setLabel('Extension file');
        $this->add($file);
        
        $submit = new \Zend\Form\Element\Submit('submit');
        $submit->setValue('Submit');
        $this->add($submit);
    }
}
