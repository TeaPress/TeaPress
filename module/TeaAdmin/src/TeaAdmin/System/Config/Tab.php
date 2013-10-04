<?php

namespace TeaAdmin\System\Config;

class Tab 
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
     * @var int
     */
    protected $order;
    
    /**
     * @var array
     */
    protected $sections;
    
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
        
        if(isset($options['sections']) && is_array($options['sections'])) {
            foreach ($options['sections'] as $sectionName => $sectionOptions) {
                $this->addSection(new \TeaAdmin\System\Config\Section($sectionName, $sectionOptions));
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

    public function getSections() {
        return $this->sections;
    }

    public function setSections($sections) {
        $this->sections = $sections;
    }
    
    public function addSection($section) {
        $this->sections[$section->getName()] = $section;
    }
}