<?php

namespace TeaAdmin\Controller;

use TeaAdmin\Controller\AbstractAdminActionController;
use Zend\View\Model\ViewModel;

class ConfigController extends AbstractAdminActionController
{
    
    public function indexAction()
    {
        $system = $this->getServiceLocator()->get('TeaAdmin\System\Config');
        
        $viewModel = new ViewModel();
        return $viewModel;
    }
    
    public function editAction()
    {
        
    }
}