<?php

namespace TeaAdmin\Controller;

use Zend\Mvc\MvcEvent;
use Zend\Mvc\Controller\AbstractActionController as BaseAbstractActionController;

class AbstractAdminActionController extends BaseAbstractActionController {

    /**
     * Register the default events for this controller
     * @return void
     */
    protected function attachDefaultListeners()
    {
        $events = $this->getEventManager();
        $events->attach(MvcEvent::EVENT_DISPATCH, array($this, 'preDispatch'), 10000);
        $events->attach(MvcEvent::EVENT_DISPATCH, array($this, 'controlPermissions'), 100);

        parent::attachDefaultListeners();
    }

    /**
     * Pre-dispatch
     * @param \Zend\Mvc\MvcEvent $e
     * @return void
     */
    public function preDispatch(MvcEvent $e) {
        // Admin access management
        $actionName = $e->getRouteMatch()->getParam('action');
        if ($actionName == 'login') {
            return;
        }

        // Redirect login
        $auth = $this->getServiceLocator()->get('TeaAdmin\Authentication\Service');
        if (!$auth->hasIdentity()) {
            return $this->plugin('redirect')->toRoute('admin/login');
        }
        
        // Display admin layout
        $controller = $e->getTarget();
        $controller->layout('layout/admin_layout');
    }

    /**
     * Control ACL authorisation
     * @param MvcEvent $e
     * @return void
     */
    public function controlPermissions(MvcEvent $e) {
        $actionName = $e->getRouteMatch()->getParam('action');
        if ($actionName == 'login') {
            return;
        }

//        $auth = $this->getServiceLocator()->get('TeaAdmin\Authentication\Service');
//        $identity = $auth->getIdentity();
//        
//        $roleService = $this->getServiceLocator()->get('TeaAdmin\Service\Role');
//        $role = $roleService->getRole($identity->role_id)->getName();
//        
//        $ressource = $e->getRouteMatch()->getMatchedRouteName();
//        $permissions = $this->getServiceLocator()->get('TeaPermissions');
//
//        if (!$permissions->isAllowed($role, $ressource)) {
//            return $this->redirect()->toRoute('admin/error', array('code' => 403));
//        }
    }
}