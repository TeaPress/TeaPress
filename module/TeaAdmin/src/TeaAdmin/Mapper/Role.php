<?php

namespace TeaAdmin\Mapper;

use TakeATea\Mapper\AbstractMapper;
use Zend\Db\Sql\Expression;

class Role extends AbstractMapper
{
    /**
     * Get role by id
     * @param int $role_id
     * @return TeaAdmin\Model\Role
     */
    public function getRoleById($id)
    {
        $select = $this->tableGateway->getSql()->select();
        $select->where('role_id = ' . $id);
        
        return $this->selectWith($select)->current();
    }
    
    /**
     * Get all role
     * @return ResultSet
     */
    public function getAllRoles()
    {
        $select = $this->tableGateway->getSql()->select();
        $select->order('role_name ASC');
        
        return $this->selectWith($select);
    }
    
    /**
     * Create or update role
     * @param \TeaAdmin\Model\Role $role
     * @return type
     */
    public function save($role)
    {
        $data = $role->toArray();
        if($role->getRoleId() !== null) {
            $data['role_updated'] = new \Zend\Db\Sql\Expression('Now()');
            $this->tableGateway->update($data, 'role_id = ' . $role->getRoleId());
            return $role;
        }
        
        $data['role_created'] = new \Zend\Db\Sql\Expression('Now()');
        $data['role_updated'] = new \Zend\Db\Sql\Expression('Now()');
        
        $this->tableGateway->insert($data);
        $role->setroleId($this->tableGateway->getLastInsertValue());
        
        return $role;
    }
    
    public function delete($roleId)
    {
        return $this->tableGateway->delete('role_id = ' . $roleId);
    }
}