<?php

namespace TeaAdmin\Model;

use TakeATea\Model\AbstractModel;

class Role extends AbstractModel
{
    protected $role_id;
    protected $role_name;
    protected $role_created;
    protected $role_updated;
    
    public function getRoleId() {
        return $this->role_id;
    }

    public function setRoleId($role_id) {
        $this->role_id = $role_id;
    }

    public function getRoleName() {
        return $this->role_name;
    }

    public function setRoleName($role_name) {
        $this->role_name = $role_name;
    }

    public function getRoleCreated() {
        return $this->role_created;
    }

    public function setRoleCreated($role_created) {
        $this->role_created = $role_created;
    }

    public function getRoleUpdated() {
        return $this->role_updated;
    }

    public function setRoleUpdated($role_updated) {
        $this->role_updated = $role_updated;
    }
}