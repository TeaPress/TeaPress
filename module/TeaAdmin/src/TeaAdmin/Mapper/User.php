<?php

namespace TeaAdmin\Mapper;

use TakeATea\Mapper\AbstractMapper;

class User extends AbstractMapper
{
    /**
     * Get all users
     * @param boolean $usePaginator
     * @return Paginator
     */
    public function getAllUsers()
    {
        $select = $this->tableGateway->getSql()->select();
        $select->order('created_at DESC');
        
        return $this->selectWith($select);
    }
}