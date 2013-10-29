<?php

namespace TeaAdmin\Cache\Storage\Adapter;

use Zend\Cache\Storage\Adapter\Filesystem;

class Filesystem extends Filesystem
{
    protected $available = true;
    
    public function setAvailable($available)
    {
        $this->available = $available;
    }
    
    public function isAvailable()
    {
        return $this->available;
    }
}