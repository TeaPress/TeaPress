<?php
namespace TeaAdmin\Form\Element;

use Zend\Form\Element\Text as BaseText;

class Text extends BaseText
{
    protected $description;
    protected $labelTips;
    
    public function getDescription()
    {
        return $this->description;
    }
    
    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }
    
    public function getLabelTips()
    {
        return $this->labelTips;
    }
    
    public function setLabelTips($labelTips)
    {
        $this->labelTips = $labelTips;
        return $this;
    }
}