<?php

namespace MyTheme;

class Module
{
    public function getConfig()
    {
        return array_replace_recursive(
            include __DIR__ . '/config/module.config.php'
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
