<?php

namespace TeaAdmin\Authentication\Storage;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class StorageFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('Config');
        $storageConfig = $config['tea-admin']['authentication']['storage'];
        
        switch(strtolower($storageConfig['type'])) {
            case 'session':
                return new \Zend\Authentication\Storage\Session($storageConfig['options']['namespace']);
                break;
        }
    }
}