<?php

namespace TeaAdmin\System;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use TeaAdmin\System\Config\Config;

class ConfigFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $configGlobal = $serviceLocator->get('Config');
        
        $config = new Config();
        
        $tabs = $configGlobal['system']['tabs'];
        foreach ($tabs as $tabName => $options) {
            $tab = new \TeaAdmin\System\Config\Tab($tabName, $options);
            $config->addTab($tab);
        }
        
        return $config;
    }    
}