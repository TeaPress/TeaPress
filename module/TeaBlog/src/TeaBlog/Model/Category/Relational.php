<?php

namespace TeaBlog\Model\Category;

use TeaBlog\Model\Category;

class Relational extends Category
{
    protected $parent;
    
    public function getParent() {
        return $this->parent;
    }

    public function setParent($parent) {
        $this->parent = $parent;
        return $this;
    }
    
    public function exchangeArray(array $data) {
        parent::exchangeArray($data);
        
        $this->parent = new \TeaBlog\Model\Category();
        //TODO.
    }
    
    public function toArray() {
        $vars = parent::toArray();
        unset($vars['parent']);
        return $vars;
    }
}