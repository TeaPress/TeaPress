<?php

namespace TeaAdmin\Authentication\Adapter;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class AdapterFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('Config');
        $authConfig = $config['tea-admin']['authentication']['adapter'];
        
        switch (strtolower($authConfig['type'])) {
            case 'db':
                $dbAdapter = $serviceLocator->get('Zend\Db\Adapter\Adapter');
                return new \Zend\Authentication\Adapter\DbTable(
                        $dbAdapter,
                        $authConfig['options']['table'],
                        $authConfig['options']['identity'],
                        $authConfig['options']['credential']);
                
                break;
            case 'ldap':
                return new \Zend\Authentication\Adapter\Ldap(
                        $authConfig['options']['options'],
                        $authConfig['options']['identity'],
                        $authConfig['options']['credential']);
                
                break;
            case 'http':
                return new \Zend\Authentication\Adapter\Http(
                        $authConfig['options']);
                break;
            case 'digest':
                return new \Zend\Authentication\Adapter\Digest(
                        $authConfig['options']['filename'], 
                        $authConfig['options']['realm'], 
                        $authConfig['options']['identity'], 
                        $authConfig['options']['credential']);
                break;
            default:
                throw new \Zend\Authentication\Adapter\Exception\InvalidArgumentException('No auth type found');
                break;
        }
    }
}