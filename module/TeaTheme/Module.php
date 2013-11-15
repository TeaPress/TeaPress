<?php

namespace TeaTheme;

use Zend\Mvc\MvcEvent;

class Module
{
    public function onBootstrap(MvcEvent $event)
    {
        $serviceManager = $event->getApplication()->getServiceManager();
        $themeManager = $serviceManager->get('TeaTheme\Theme\Manager');
    }
    
    public function getConfig()
    {
        return array_replace_recursive(
            include __DIR__ . '/config/module.config.php',
            include __DIR__ . '/config/module.config.system.php'
        );
    }
    
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
}
