<?php
namespace TeaAdmin\Form\Element;

use Zend\Form\Element\Radio as BaseRadio;

class Radio extends BaseRadio
{
    protected $description;
    
    public function getDescription()
    {
        return $this->description;
    }
    
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }
}

