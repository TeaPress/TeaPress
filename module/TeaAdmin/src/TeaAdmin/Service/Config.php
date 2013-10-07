<?php

namespace TeaAdmin\Service;

use TakeATea\Service\AbstractService;

class Config extends AbstractService
{
    protected $mapper = 'TeaAdmin\Mapper\Config';
    
    public function getAllConfig()
    {
        return $this->getMapper()->getAllConfig();
    }
    
    public function save($data)
    {
        
    }
}