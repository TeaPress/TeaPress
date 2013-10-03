<?php

namespace TeaAdmin\System\Config;

class Section 
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
    protected $groups;
    
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
        
        if(isset($options['groups']) && is_array($options['groups'])) {
            foreach ($options['groups'] as $groupName => $groupOptions) {
                $this->addGroup(new \TeaAdmin\System\Config\Group($groupName, $groupOptions));
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

    public function getGroups() {
        return $this->groups;
    }

    public function setGroups($groups) {
        $this->groups = $groups;
    }
    
    public function addGroup($group) {
        $this->groups[$group->getName()] = $group;
    }
}