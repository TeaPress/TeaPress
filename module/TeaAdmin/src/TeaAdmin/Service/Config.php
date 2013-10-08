<?php

namespace TeaAdmin\Service;

use TakeATea\Service\AbstractService;

class Config extends AbstractService
{
    protected $mapper = 'TeaAdmin\Mapper\Config';
    
    public function getConfigWithDefaultValue($paths)
    {
        $configDb = $this->getMapper()->getConfigFromPaths($paths);
        
        $values = array();
        foreach ($paths as $path) {
            
        }
    }
    
    public function save($data)
    {
        
    }
}