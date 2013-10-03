<?php

namespace TeaAdmin\Mapper;

use TakeATea\Mapper\AbstractMapper;

class Rule extends AbstractMapper
{
    /**
     * Get all rule with role
     * @return Zend\Db\ResultSet\ResultSet
     */
    public function getAllRuleWithRole()
    {
        $select = $this->tableGateway->getSql()->select();
        $select->join('admin_role', 'admin_role.role_id = ' . $this->tableGateway->table . '.role_id', \Zend\Db\Sql\Select::SQL_STAR, \Zend\Db\Sql\Select::JOIN_LEFT);
        
        return $this->selectWith($select);
    }
}