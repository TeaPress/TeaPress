<?php

namespace TeaCore\System\Config;

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
    
    /*
     * @var \Zend\Form\FormInterface
     */
    protected $form;
    
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
                $this->addGroup(new \TeaCore\System\Config\Group($groupName, $groupOptions));
            }
        }
        
        return $this;
    }
    
    /**
     * get form
     * @return \Zend\Form\Form
     */
    public function getForm()
    {
        if($this->form == null) {
            $form = new \Zend\Form\Form();

            foreach ($this->getGroups() as $group) {
                foreach ($group->getFields() as $field) {
                    $form->add($field->getElement());
                }
            }
            $this->form = $form;
        }
        
        return $this->form;
    }
    
    /**
     * Populate section values.
     * @param array $data
     */
    public function populate($data)
    {
        $dataValues = array_values($data);
        $dataKeys = array_keys($data);
        
        foreach($this->getGroups() as $group) {
            foreach($group->getFields() as $field) {
                $key = array_search($field->getName(), $dataKeys);
                if($key !== false) {
                    $field->setValue($dataValues[$key]);
                }
            }
        }
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