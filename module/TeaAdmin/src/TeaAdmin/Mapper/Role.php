<?php

namespace TeaAdmin\Mapper;

use TakeATea\Mapper\AbstractMapper;

class Role extends AbstractMapper
{
    public function getAllRoles()
    {
        $select = $this->tableGateway->getSql()->select();
        $select->order('name ASC');
        
        return $this->selectWith($select);
    }
}