<?php

namespace TeaBlog\Model\Category;

use TeaBlog\Model\Category;

class Relational extends Category
{
    protected $childrens = array();
    
    public function getChildrens() {
        return $this->childrens;
    }

    public function setChildrens($childrens) {
        $this->childrens = $childrens;
    }
    
    public function addChildren($children) {
        return $this->chidrens[] = $children;
    }
    
    public function toArray() {
        $vars = parent::toArray();
        unset($vars['childrens']);
        
        return $vars;
    }
}