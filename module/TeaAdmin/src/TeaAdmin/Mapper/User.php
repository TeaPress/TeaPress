<?php

namespace TeaAdmin\Mapper;

use TakeATea\Mapper\AbstractMapper;
use Zend\Db\Sql\Expression;

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
    
    /**
     * Create or update user
     * @param \TeaAdmin\Model\User $user
     * @return type
     */
    public function save(\TeaAdmin\Model\User $user)
    {
        $data = $user->toArray();
        $data['created_at'] = new Expression('NOW()');
        $data['updated_at'] = new Expression('NOW()');
        
        return $this->tableGateway->insert($data);
    }
}