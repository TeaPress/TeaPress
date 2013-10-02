<?php

namespace TeaAdmin\Model\Role;

use TeaAdmin\Model\Role;

class Relationnal extends Role
{
    /**
     * @var array
     */
    protected $rules;
    
    public function getRules() {
        return $this->rules;
    }

    public function setRules($rules) {
        $this->rules = $rules;
    }
}