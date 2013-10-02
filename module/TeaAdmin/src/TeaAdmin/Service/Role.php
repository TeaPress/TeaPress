<?php

namespace TeaAdmin\Service;

use TakeATea\Service\AbstractService;

class Role extends AbstractService
{
    protected $mapper = 'TeaAdmin\Mapper\Role';
    
    /**
     * Get role by id
     * @param int $role_id
     * @return TeaAdmin\Model\Role
     */
    public function getRoleById($role_id)
    {
        return $this->getMapper()->getRoleById($role_id);
    }
    
    /**
     * Get all role with attach rules
     * @return Zend\Db\ResultSet\ResultSer
     */
    public function getAllRoleWithRules()
    {
        return $this->getMapper()->getAllRoleWithRules();
    }
    
    /**
     * Get all roles
     * @param boolean $usePaginator
     * @return Paginator
     */
    public function getAllRoles($usePaginator = true)
    {
        if($usePaginator) {
            $this->usePaginator();
        }
        return $this->getMapper()->getAllRoles();
    }
    
    /**
     * Create or update role
     * @param \TeaAdmin\Model\Role $role
     * @return type
     */
    public function save(\TeaAdmin\Model\Role $role)
    {
        return $this->getMapper()->save($role);
    }
}