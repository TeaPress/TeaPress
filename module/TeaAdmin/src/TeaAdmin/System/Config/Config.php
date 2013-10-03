<?php

namespace TeaAdmin\System\Config;

class Config 
{
    /*
     * @var array
     */
    protected $tabs;
    
    /*
     * @var array
     */
    protected $sections;
    
    public function getTabs() {
        return $this->tabs;
    }

    public function setTabs($tabs) {
        $this->tabs = $tabs;
    }
    
    public function addTab($tab) {
        $this->tabs[$tab->getName()] = $tab;
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