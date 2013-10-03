<?php

namespace TeaAdmin\Model;

use TakeATea\Model\AbstractModel;

class Rule extends AbstractModel
{
    protected $rule_id;
    protected $role_id;
    protected $resource;
    protected $permission;
    
    public function getRuleId() {
        return $this->rule_id;
    }

    public function setRuleId($rule_id) {
        $this->rule_id = $rule_id;
    }

    public function getRoleId() {
        return $this->role_id;
    }

    public function setRoleId($role_id) {
        $this->role_id = $role_id;
    }

    public function getResource() {
        return $this->resource;
    }

    public function setResource($resource) {
        $this->resource = $resource;
    }

    public function getPermission() {
        return $this->permission;
    }

    public function setPermission($permission) {
        $this->permission = $permission;
    }
}