<?php

namespace TeaAdmin\Model\User;

use TeaAdmin\Model\User;
use TeaAdmin\Model\Role;

class Relational extends User
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
    
    public function toArray() {
        $vars = parent::toArray();
        unset($vars['role']);
        
        return $vars; 
    }
    
    public function getRole() {
        return $this->role;
    }

    public function setRole($role) {
        $this->role = $role;
    }
}