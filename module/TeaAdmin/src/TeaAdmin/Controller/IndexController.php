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
}
