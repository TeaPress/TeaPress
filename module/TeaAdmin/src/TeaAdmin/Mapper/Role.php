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
    public function getRoleById($role_id)
    {
        $select = $this->tableGateway->getSql()->select();
        $select->where('role_id = ' . $role_id);
        
        return $this->selectWith($select)->current();
    }
    
    /**
     * Get all role
     * @return ResultSet
     */
    public function getAllRoles()
    {
        $select = $this->tableGateway->getSql()->select();
        $select->order('name ASC');
        
        return $this->selectWith($select);
    }
    
    /**
     * Get all role with attach rules
     * @return Zend\Db\ResultSet\ResultSer
     */
    public function getAllRoleWithRules()
    {
        $select = $this->tableGateway->getSql()->select();
        $select->join('admin_rule', 'admin_rule.role_id = ' . $this->tableGateway->table . '.role_id', \Zend\Db\Sql\Select::SQL_STAR, \Zend\Db\Sql\Select::JOIN_LEFT);
        
        return $this->selectWith($select);
    }
    
    /**
     * Create or update role
     * @param \TeaAdmin\Model\Role $role
     * @return type
     */
    public function save(\TeaAdmin\Model\Role $role)
    {
        $data = $role->toArray();
        
        if($role->getRoleId() != null) {
            $data['updated_at'] = new Expression('NOW()');
            
            return $this->tableGateway->update($data, 'role_id = ' . $role->getRoleId());
        } else {
            $data['created_at'] = new Expression('NOW()');
            $data['updated_at'] = new Expression('NOW()');
            
            return $this->tableGateway->insert($data);
        }
    }
}