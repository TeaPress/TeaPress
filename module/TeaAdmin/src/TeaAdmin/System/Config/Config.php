<?php

namespace TeaAdmin\System\Config;

class Config 
{
    /*
     * @var array
     */
    protected $tabs;
    
    protected $adatper;

    public function getTabs() {
        return $this->tabs;
    }

    public function setTabs($tabs) {
        $this->tabs = $tabs;
    }
    
    public function addTab($tab) {
        $this->tabs[$tab->getName()] = $tab;
    }
}