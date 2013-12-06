<?php

namespace TeaAdmin;

use Zend\View\HelperPluginManager;
use TeaAdmin\Model;
use TeaAdmin\Mapper;

class Module
{   
    /**
     * @return array
     */
    public function getViewHelperConfig()
    {
        return array(
            'factories' => array(
                'navigation' => function(HelperPluginManager $pm) {
                    $acl = $pm->getServiceLocator()->get('TeaAdmin\Permissions\Service\Acl');
                    
                    $navigation = $pm->get('Zend\View\Helper\Navigation');
                    $navigation->setAcl($acl);
                               
                    if($pm->getServiceLocator()->get('TeaAdmin\Authentication\Service')->hasIdentity()) {
                        $role = $pm->getServiceLocator()->get('TeaAdmin\Authentication\Service')->getIdentity()->role->getRoleName();
                        $navigation->setRole($role);
                    }
                    
                    return $navigation;
                },
                'formResource' => function(HelperPluginManager $pm) {
                    $formResource = $pm->get('TeaAdmin\View\Helper\FormResource');
                    
                    if($pm->getServiceLocator()->get('TeaAdmin\Authentication\Service')->hasIdentity()) {
                        $role = $pm->getServiceLocator()->get('TeaAdmin\Authentication\Service')->getIdentity()->role;
                        $formResource->setRole($role);
                    }
                    
                    $formResource->setAcl($pm->getServiceLocator()->get('TeaAdmin\Permissions\Service\Acl'));
                    
                    return $formResource;
                },
                'permission' => function(HelperPluginManager $pm) {
                    $permission = $pm->get('TeaAdmin\View\Helper\Permission');
                    
                    if($pm->getServiceLocator()->get('TeaAdmin\Authentication\Service')->hasIdentity()) {
                        $role = $pm->getServiceLocator()->get('TeaAdmin\Authentication\Service')->getIdentity()->role;
                        $permission->setRole($role);
                    }
                    
                    $permission->setAcl($pm->getServiceLocator()->get('TeaAdmin\Permissions\Service\Acl'));
                    
                    return $permission;
                }
            )
        );
    }
    
    /**
     * 
     * @return array
     */
    public function getServiceConfig()
    {
        return array(
            'factories' => array(
				'Zend\Db\Adapter\Adapter' => function ($serviceManager) {
					$adapterFactory = new \Zend\Db\Adapter\AdapterServiceFactory();
					$adapter = $adapterFactory->createService($serviceManager);
					\Zend\Db\TableGateway\Feature\GlobalAdapterFeature::setStaticAdapter($adapter);
					return $adapter;
				},
                'TeaAdmin\Mapper\User' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new \Zend\Db\ResultSet\ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\User\Relational());
                    $tableGateway = new \Zend\Db\TableGateway\TableGateway('admin_user', $dbAdapter, null, $resultSetPrototype);
                    $table = new Mapper\User($tableGateway);
                    return $table;
                },
                'TeaAdmin\Mapper\Role' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new \Zend\Db\ResultSet\ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\Role());
                    $tableGateway = new \Zend\Db\TableGateway\TableGateway('admin_role', $dbAdapter, null, $resultSetPrototype);
                    $table = new Mapper\Role($tableGateway);
                    return $table;
                },
                'TeaAdmin\Mapper\Rule' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new \Zend\Db\ResultSet\ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\Rule\Relationnal());
                    $tableGateway = new \Zend\Db\TableGateway\TableGateway('admin_rule', $dbAdapter, null, $resultSetPrototype);
                    $table = new Mapper\Rule($tableGateway);
                    return $table;
                },
                'TeaAdmin\Mapper\Log' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new \Zend\Db\ResultSet\ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\Log());
                    $tableGateway = new \Zend\Db\TableGateway\TableGateway('admin_log', $dbAdapter, null, $resultSetPrototype);
                    $table = new Mapper\Log($tableGateway);
                    return $table;
                },
                'TeaAdmin\Mapper\Config' => function ($sm) {
                    $dbAdapter = $sm->get('Zend\Db\Adapter\Adapter');
                    $resultSetPrototype = new \Zend\Db\ResultSet\ResultSet();
                    $resultSetPrototype->setArrayObjectPrototype(new Model\Config());
                    $tableGateway = new \Zend\Db\TableGateway\TableGateway('admin_config', $dbAdapter, null, $resultSetPrototype);
                    $table = new Mapper\Config($tableGateway);
                    return $table;
                },
            ),
        );
    }

//    public function getViewHelperConfig()
//    {
//         return array(
//            'factories' => array(
//                'TeaAdminUserInfo' => function ($sm) {
//                    $viewHelper = new View\Helper\DisplayUserInfo();
//                    $viewHelper->setAuthService($sm->getServicelocator()->get('TeaAdmin\Authentication\Service'));
//                    return $viewHelper;
//                },
//            ),
//        );
//    }

//    public function onBootstrap($e)
//    {
//        $app          = $e->getParam('application');
//        $locator      = $app->getServiceManager();
//
//        $renderer     = $locator->get('Zend\View\Renderer\PhpRenderer');
//        $renderer->plugin('headScript')
//                ->appendFile('/js/jquery-1.8.3.min.js')
//                ->appendFile('/js/jquery-ui-1.9.1.custom.min.js')
//                ->appendFile('/js/bootstrap.min.js')
//                ->appendFile('/js/html5.js')
//                ->appendFile('/js/jquery.dataTables.min.js')
//                ->appendFile('/js/jquery.dataTables.ColumnFilterWidgets.js')
//                ->appendFile('/js/jquery.tree.min.js')
//                ->appendFile('/js/jquery.timer.js')
//                ->appendFile('/js/custom.js');
//
//        $renderer->plugin('headLink')
//                ->appendStylesheet('/css/bootstrap.min.css')
//                ->appendStylesheet('/css/bootstrap-responsive.min.css')
//                ->appendStylesheet('/css/jquery.tree.min.css')
//                ->appendStylesheet('/css/jquery-ui-1.9.1.min.css')
//                ->appendStylesheet('/css/style.css');
//        
//        $evt = $app->getEventManager();
//        $evt->attach(MvcEvent::EVENT_DISPATCH_ERROR, array($this,'onDispatchError'), 100);
//    }
    
    public function getConfig()
    {
        return array_replace_recursive(
            include __DIR__ . '/config/module.config.php',
            include __DIR__ . '/config/module.config.routes.php',
            include __DIR__ . '/config/module.config.acl.php',
            include __DIR__ . '/config/module.config.navigation.php',
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
