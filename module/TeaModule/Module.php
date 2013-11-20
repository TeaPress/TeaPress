<?php

namespace TeaModule;

class Module
{
    public function getConfig()
    {
        return array_replace_recursive(
            include __DIR__ . '/config/module.config.php',
            include __DIR__ . '/config/module.config.routes.php',
            include __DIR__ . '/config/module.config.acl.php',
            include __DIR__ . '/config/module.config.navigation.php'
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
