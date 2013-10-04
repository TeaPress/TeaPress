<?php

namespace TeaAdmin\Controller;

use TeaAdmin\Controller\AbstractAdminActionController;
use Zend\View\Model\ViewModel;

class ConfigController extends AbstractAdminActionController
{
    
    public function indexAction()
    {
        $config = $this->getServiceLocator()->get('TeaAdmin\System\Config');
        
        $viewModel = new ViewModel();
        $viewModel->setVariable('config', $config);
        return $viewModel;
    }
    
    public function editAction()
    {
        
    }
}