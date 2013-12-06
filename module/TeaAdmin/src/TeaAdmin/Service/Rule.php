<?php

namespace TeaAdmin\Service;

use TakeATea\Service\AbstractService;

class Rule extends AbstractService
{
    protected $mapper = 'TeaAdmin\Mapper\Rule';
    
    /**
     * Get all rule with role
     * @return Zend\Db\ResultSet\ResultSet
     */
    public function getAllRuleWithRole()
    {
        return $this->getMapper()->getAllRuleWithRole();
    }
    
    public function getResourceRulesFromRole($roleId)
    {
    	$rules = $this->getMapper()->getRulesFromRole($roleId);
    	
    	$resources = array();
    	foreach ($rules as $rule) {
			$resources[] = $rule->getResource();
    	}
    	
    	return $resources;
    }
    
    public function deleteRulesFromRole($roleId)
    {
    	return $this->getMapper()->deleteRulesFromRole($roleId);
    }
    
    public function save($rule)
    {
    	return $this->getMapper()->save($rule);
    }
}