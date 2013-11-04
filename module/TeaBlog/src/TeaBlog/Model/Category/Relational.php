<?php

namespace TeaBlog\Model\Category;

use TeaBlog\Model\Category;

class Relational extends Category
{
    protected $chidrens = array();
    
    public function getChildrens() {
        return $this->childrens;
    }

    public function setChildrens($childrens) {
        $this->childrens = $childrens;
    }
    
    public function addChildren($children) {
        return $this->chidrens[] = $children;
    }
}