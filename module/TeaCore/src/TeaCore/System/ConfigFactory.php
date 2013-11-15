<?php

namespace TeaCore\System;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use TeaCore\System\Config\Config;

class ConfigFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $configGlobal = $serviceLocator->get('Config');

        $config = new Config();

        $tabs = $configGlobal['system']['tabs'];
        foreach ($tabs as $tabName => $options) {
            $tab = new \TeaCore\System\Config\Tab($serviceLocator, $tabName, $options);
            $config->addTab($tab);
        }

        return $config;
    }
}