<?php

namespace TeaCore;

use TeaCore\Model;
use TeaCore\Mapper;

class Module
{
    
    /**
     * 
     * @return array
     */
    public function getServiceConfig()
    {
        return array(
            'factories' => array(
                'TeaCore\Mapper\Config' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new \Zend\Db\ResultSet\ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\Config());
                    $tableGateway = new \Zend\Db\TableGateway\TableGateway('core_config', $dbAdapter, null, $resultSetPrototype);
                    $table = new Mapper\Config($tableGateway);
                    return $table;
                },
            ),
        );
    }
    
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
