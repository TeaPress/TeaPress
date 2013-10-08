<?php

namespace TeaBlog;

use TeaBlog\Model;
use TeaBlog\Mapper;

class Module
{
    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                // Mapper
                'TeaBlog\Mapper\Post' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new \Zend\Db\ResultSet\ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\Post());
                    $tableGateway = new \Zend\Db\TableGateway\TableGateway('blog_post', $dbAdapter, null, $resultSetPrototype);
                    $table = new Mapper\Post($tableGateway);
                    return $table;
                },
                'TeaBlog\Mapper\Category' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new \Zend\Db\ResultSet\ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\Category());
                    $tableGateway = new \Zend\Db\TableGateway\TableGateway('blog_category', $dbAdapter, null, $resultSetPrototype);
                    $table = new Mapper\Category($tableGateway);
                    return $table;
                },
            )
        );
    }
    
    public function getViewHelperConfig()
    {
        return array(
            'factories' => array(
                'latest' => function ($serviceManager) {
                    $helper = new \TeaBlog\View\Helper\Latest();
                    $helper->setServiceLocator($serviceManager->getServiceLocator());
                    return $helper;
                },
                'category' => function ($serviceManager) {
                    $helper = new \TeaBlog\View\Helper\Category();
                    $helper->setServiceLocator($serviceManager->getServiceLocator());
                    return $helper;
                },
            )
        );	
    }

    public function getConfig()
    {
        return array_replace_recursive(
            include __DIR__ . '/config/module.config.php',
            include __DIR__ . '/config/module.config.routes.php',
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
