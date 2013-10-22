<?php

namespace TeaAdmin\Controller;

use TeaAdmin\Controller\AbstractAdminActionController;
use Zend\View\Model\ViewModel;

class CacheController extends AbstractAdminActionController
{
    public function indexAction()
    {
        $config = $this->getServiceLocator()->get('Config');
        $caches = $config['caches'];
        
        $viewModel = new ViewModel();
        $viewModel->setVariable('caches', $caches);
        return $viewModel;
    }
    
    public function flushAction()
    {
        $key = $this->getEvent()->getRouteMatch()->getParam('key');
        if(!$key) {
            $this->getResponse()->setStatusCode(404);
            return;
        }
        
        $cache = $this->getServiceLocator()->get($key);
        
        $result = $cache->flush();
        
        if($result) {
            $this->flashMessenger()->addSuccessMessage('Cache flush successfull');
        } else {
            $this->flashMessenger()->addErrorMessage('Error durnig flushing cache');
        }
        
        $this->redirect()->toRoute('admin/cache');
    }
    
    public function flushAllAction()
    {
        $config = $this->getServiceLocator()->get('Config');
        $caches = $config['caches'];
        
        foreach ($caches as $key => $cache) {
            $this->getServiceLocator()->get($key)->flush();
        }
        
        $this->flashMessenger()->addSuccessMessage('All Cache flush successfull');
        
        $this->redirect()->toRoute('admin/cache');
    }
}