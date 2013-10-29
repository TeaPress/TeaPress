<?php

namespace TeaCore\System\Config;

class Config 
{
    /*
     * @var array
     */
    protected $tabs;
    
    /**
     * Get tabs
     * @return array
     */
    public function getTabs() {
        return $this->tabs;
    }
    
    /**
     * Set tabs
     * @param type $tabs
     */
    public function setTabs($tabs) {
        $this->tabs = $tabs;
    }
    
    /**
     * Add tab
     * @param TeaAdmin\System\Config\Tab $tab
     */
    public function addTab($tab) {
        $this->tabs[$tab->getName()] = $tab;
    }
    
    /**
     * Search Section
     * @param string $name
     * @return boolean | Section
     */
    public function getSection($name)
    {
        foreach ($this->tabs as $tab) {
            if($tab->hasSection($name)) {
                return $tab->getSection($name);
            }
        }
        return false;
    }
}