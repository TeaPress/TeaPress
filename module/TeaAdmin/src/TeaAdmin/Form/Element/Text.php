<?php
namespace TeaAdmin\Form\Element;

use Zend\Form\Element\Text as BaseText;

class Text extends BaseText
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
