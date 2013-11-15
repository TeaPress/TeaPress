<?php

namespace TeaTheme\Theme;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
        
class Factory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $config = $serviceLocator->get('Config');
        $manager = new Manager($serviceLocator, $config['tea_theme']);
        return $manager;
    }
}
