<?php

namespace TeaAdmin\System\Config;

class Config 
{
    /*
     * @var array
     */
    protected $tabs;
    
    /*
     * @var TeaAdmin\System\Adapter\AdapterInterface
     */
    protected $adapter;

    
    public function getTabs() {
        return $this->tabs;
    }

    public function setTabs($tabs) {
        $this->tabs = $tabs;
    }
    
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