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
     * @return Paginator
     */
    public function getAllUsers()
    {
        $select = $this->tableGateway->getSql()->select();
        $select->join('admin_role', 'admin_role.role_id = admin_user.role_id', array('role_name'));
        $select->order('admin_user.username ASC');
        
        return $this->selectWith($select);
    }
    
    /**
     * Create or update user
     * @param \TeaAdmin\Model\User $user
     * @return type
     */
    public function save($user)
    {
        $data = $user->toArray();
        if($user->getUserId() !== null) {
            $data['user_updated'] = new \Zend\Db\Sql\Expression('Now()');
            return $this->tableGateway->update($data, 'user_id = ' . $user->getUserId());
        }
        
        $data['user_created'] = new \Zend\Db\Sql\Expression('Now()');
        $data['user_updated'] = new \Zend\Db\Sql\Expression('Now()');
        return $this->tableGateway->insert($data);
    }
}