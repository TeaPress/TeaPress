<?php

namespace TeaAdmin\Model\Rule;

use TeaAdmin\Model\Rule;
use TeaAdmin\Model\Role;

class Relationnal extends Rule
{
    /**
     * @var TeaAdmin\Model\Role
     */
    protected $role;
    
    public function exchangeArray(array $data)
    {
        parent::exchangeArray($data);
        
        $this->role = new Role();
        $this->role->exchangeArray($data);
        
        return $this;
    }
    
    public function getRole() {
        return $this->role;
    }

    public function setRole($role) {
        $this->role = $role;
    }
}