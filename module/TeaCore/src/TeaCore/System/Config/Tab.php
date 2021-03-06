<?php

namespace TeaCore\System\Config;

use Zend\Stdlib\AbstractOptions;

class Tab extends AbstractOptions  
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
    public function __construct($serviceLocator, $name, array $options)
    {
        parent::__construct($options);
        
        $this->name = $name;
        
        if(isset($options['sections']) && is_array($options['sections'])) {
            foreach ($options['sections'] as $sectionName => $sectionOptions) {
                $this->addSection(new \TeaCore\System\Config\Section($serviceLocator, $sectionName, $sectionOptions));
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
    
    public function hasSection($name) {
        return isset($this->sections[$name]);
    }
    
    public function getSection($name) {
        return $this->sections[$name];
    }
}