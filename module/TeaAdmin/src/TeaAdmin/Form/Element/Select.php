<?php
namespace TeaAdmin\Form\Element;

use Zend\Form\Element\Select as BaseSelect;

class Select extends BaseSelect
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
