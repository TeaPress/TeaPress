<?php

namespace TeaAdmin\Controller;

use TeaAdmin\Controller\AbstractAdminActionController;
use Zend\View\Model\ViewModel;

class UserController extends AbstractAdminActionController
{
    public function indexAction()
    {
        $config = $this->getServiceLocator()->get('Config');
        
        $list = $this->getServiceLocator()->get('TeaAdmin\Service\User')->getAllUsers(true);
        $list->setCurrentPageNumber((int)$this->params()->fromQuery('page', 1));
        $list->setItemCountPerPage($config['tea-admin']['list']['itemCountPerPage']);
        
        $viewModel = new ViewModel();
        $viewModel->setVariable('users', $list);
        return $viewModel;
    }
    
    public function newAction()
    {
        
    }
    
    public function editAction()
    {
        
    }
    
    
}