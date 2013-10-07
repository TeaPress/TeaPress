<?php

namespace TeaAdmin\System\Config;

class Field
{
    /**
     * @var string
     */
    protected $name;
    
    /**
     * @var string
     */
    protected $label;
    
    /**
     * @var string 
     */
    protected $value;
    
    /**
     * @var string
     */
    protected $comment;
    
    /**
     * @var string
     */
    protected $type;

    /**
     * @var string
     */
    protected $order;
    
    public function __construct($name, $options)
    {
        $this->name = $name;
        
        if(isset($options['label'])) {
            $this->label = $options['label'];
        }
        
        if(isset($options['comment'])) {
            $this->comment = $options['comment'];
        }
        
        if(isset($options['type'])) {
            $this->type = $options['type'];
        }
        
        if(isset($options['order'])) {
            $this->order = $options['order'];
        }
        
        return $this;
    }
    
    public function getElement()
    {
        switch (strtolower($this->type)) {
            case 'Text':
            default:
                $element = new \Zend\Form\Element\Text($this->name);
                break;
            case 'Textarea':
                $element = new \Zend\Form\Element\Textarea($this->name);
                break;
        }
        
        $element->setLabel($this->label);
        
        if($this->value != null) {
            $element->setValue($this->value);
        }
        
        return $element;
    }
    
    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getLabel() {
        return $this->label;
    }

    public function setLabel($label) {
        $this->label = $label;
    }
    
    public function getValue() {
        return $this->value;
    }

    public function setValue($value) {
        $this->value = $value;
    }

    public function getComment() {
        return $this->comment;
    }

    public function setComment($comment) {
        $this->comment = $comment;
    }

    public function getType() {
        return $this->type;
    }

    public function setType($type) {
        $this->type = $type;
    }

    public function getOrder() {
        return $this->order;
    }

    public function setOrder($order) {
        $this->order = $order;
    }
}