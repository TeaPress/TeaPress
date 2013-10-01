<?php

namespace TeaAdmin\Service;

use TakeATea\Service\AbstractService;

class User extends AbstractService
{
    protected $mapper = 'TeaAdmin\Mapper\User';
    
    /**
     * fetch row of User with id
     * @param int $user_id
     * @return TeaAdmin\Model\User
     */
    public function getUserById($user_id)
    {
        return $this->getMapper()->getUserById($user_id);
    }
    
    /**
     * Get all users
     * @param boolean $usePaginator
     * @return Paginator
     */
    public function getAllUsers($usePaginator = true)
    {
        if($usePaginator) {
            $this->usePaginator();
        }
        return $this->getMapper()->getAllUsers();
    }
    
    /**
     * Create or update user
     * @param \TeaAdmin\Model\User $user
     * @return type
     */
    public function save(\TeaAdmin\Model\User $user)
    {
        return $this->getMapper()->save($user);
    }
}