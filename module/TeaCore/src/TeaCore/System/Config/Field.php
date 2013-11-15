<?php

namespace TeaCore\System\Config;

class Field
{
    /**
     * @var int 
     */
    protected $id;
    
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
    
    /*
     * @var \Zend\Form\ElementInterface
     */
    protected $element;
    
    protected $options;
    
    protected $serviceLocator;
    
    public function __construct($serviceLocator, $name, $options)
    {
        $this->name = $name;
        $this->serviceLocator = $serviceLocator;
        
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
        
        if(isset($options['options'])) {
            $this->options = $options['options'];
        }
        
        return $this;
    }
    
    public function getElement()
    {
        if($this->element == null) {
            switch (strtolower($this->type)) {
                case 'text':
                default:
                    $this->element = new \Zend\Form\Element\Text($this->name);
                    break;
                case 'textarea':
                    $this->element = new \Zend\Form\Element\Textarea($this->name);
                    break;
                case 'select':
                    $element = new \Zend\Form\Element\Select($this->name);
                    $options = $this->serviceLocator->get($this->options['service'])->{$this->options['function']}();
                    $element->setValueOptions($options);
                    $this->element = $element;
                    break;
            }

            $this->element->setLabel($this->label);

            if($this->value != null) {
                $this->element->setValue($this->value);
            }
        }
        
        return $this->element;
    }
    
    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
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