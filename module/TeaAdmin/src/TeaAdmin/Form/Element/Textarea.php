<?php
namespace TeaAdmin\Form\Element;

use Zend\Form\Element\Textarea as BaseTextarea;

class Textarea extends BaseTextarea
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
