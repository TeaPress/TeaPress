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
}