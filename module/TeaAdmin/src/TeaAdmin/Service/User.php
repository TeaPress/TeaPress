<?php

namespace TeaAdmin\Service;

use TakeATea\Service\AbstractService;

class User extends AbstractService
{
    protected $mapper = 'TeaAdmin\Mapper\User';
    
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
}