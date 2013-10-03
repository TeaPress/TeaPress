<?php

namespace TeaAdmin\System\Config;

class Group 
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
    protected $order;
    
    /**
     * @var array
     */
    protected $fields;
    
    /**
     * 
     * @param string $name
     * @param array $options
     */
    public function __construct($name, array $options)
    {
        $this->name = $name;
        
        if(isset($options['label'])) {
            $this->label = $options['label'];
        }
        
        if(isset($options['order'])) {
            $this->order = $options['order'];
        }
        
        if(isset($options['fields']) && is_array($options['fields'])) {
            foreach ($options['fields'] as $fieldName => $fieldOptions) {
                $this->addField(new \TeaAdmin\System\Config\Field($fieldName, $fieldOptions));
            }
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

    public function getOrder() {
        return $this->order;
    }

    public function setOrder($order) {
        $this->order = $order;
    }

    public function getFields() {
        return $this->fields;
    }

    public function setFields($fields) {
        $this->fields = $fields;
    }

    public function addField($field) {
        $this->fields[$field->getName()] = $field;
    }
}