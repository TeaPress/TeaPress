<?php

namespace TeaAdmin\Service;

use TakeATea\Service\AbstractService;

class Role extends AbstractService
{
    protected $mapper = 'TeaAdmin\Mapper\Role';
    
    public function getAllRoles()
    {
        return $this->getMapper()->getAllRoles();
    }
}