<?php

namespace TeaAdmin\Mapper;

use TakeATea\Mapper\AbstractMapper;
use Zend\Db\Sql\Expression;

class User extends AbstractMapper
{
    /**
     * fetch row of User with id
     * @param int $user_id
     * @return TeaAdmin\Model\User
     */
    public function getUserById($user_id)
    {
        $select = $this->tableGateway->getSql()->select();
        $select->where('user_id = ' . $user_id);
        
        return $this->selectWith($select)->current();
    }
    
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
        
        if($user->getUserId() != null) {
            $data['updated_at'] = new Expression('NOW()');
            
            return $this->tableGateway->update($data, 'user_id = ' . $user->getUserId());
        } else {
            $data['created_at'] = new Expression('NOW()');
            $data['updated_at'] = new Expression('NOW()');
            
            return $this->tableGateway->insert($data);
        }
    }
}