<?php

namespace TeaAdmin\Controller;

use TeaAdmin\Controller\AbstractAdminActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractAdminActionController
{
    /**
     * Display dashboard of admin
     * @return \Zend\View\Model\ViewModel
     */
    public function indexAction()
    {
        $viewModel = new ViewModel();
        return $viewModel;
    }
    
    /**
     * Login page for authentication on administration
     * @return \Zend\View\Model\ViewModel
     */
    public function loginAction()
    {
        $form = new \TeaAdmin\Form\Login();
        
        $viewModel = new ViewModel();
        $viewModel->setTerminal(true);
        $viewModel->setVariable('form', $form);
        return $viewModel;
    }
}
