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