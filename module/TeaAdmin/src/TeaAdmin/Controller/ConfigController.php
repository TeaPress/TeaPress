<?php

namespace TeaAdmin\Controller;

use TeaAdmin\Controller\AbstractAdminActionController;
use Zend\View\Model\ViewModel;

class ConfigController extends AbstractAdminActionController
{
    
    public function indexAction()
    {
        $config = $this->getServiceLocator()->get('TeaAdmin\System\Config');
        
        $section = $config->getSection('web');
        
        $viewModel = new ViewModel();
        $viewModel->setVariable('config', $config);
        $viewModel->setVariable('section', $section);
        return $viewModel;
    }
    
    public function editAction()
    {
        $sectionName = $this->getEvent()->getRouteMatch()->getParam('section');
        
        $config = $this->getServiceLocator()->get('TeaAdmin\System\Config');
        $section = $config->getSection($sectionName);
        
        $form = $section->getForm();
        $form->setData($this->getServiceLocator()->get('TeaAdmin\Service\Config')->getAllConfigWithDefaultValue());
        
        if($this->getRequest()->isPost()) {
            $this->redirect()->toRoute('admin/config/edit', array('section' => $sectionName));
        }
        
        $viewModel = new ViewModel();
        $viewModel->setVariable('config', $config);
        $viewModel->setVariable('section', $section);
        return $viewModel;
    }
}