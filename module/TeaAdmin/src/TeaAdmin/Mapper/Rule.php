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
    
    public function getRulesFromRole($roleId)
    {
    	$select = $this->tableGateway->getSql()->select();
    	$select->where('permission = 1 AND role_id = ' . $roleId);
    	
    	return $this->selectWith($select);
    }
    
    public function deleteRulesFromRole($roleId)
    {
    	return $this->tableGateway->delete('role_id = ' . $roleId);
    }
    
    /**
     * Insert or Update rule
     * @param \TeaAdmin\Model\Rule $rule
     */
    public function save($rule)
    {
    	$data = $rule->toArray();
    	if($rule->getRuleId() !== null) {
    		return $this->tableGateway->update($data, 'rule_id = ' . $rule->getRuleId());
    	}
    	
    	return $this->tableGateway->insert($data);
    }
}