<?php

namespace TeaAdmin\Controller;

use TeaAdmin\Controller\AbstractAdminActionController;
use Zend\View\Model\ViewModel;

class ConfigController extends AbstractAdminActionController
{
    
    public function indexAction()
    {
//        $config = $this->getServiceLocator()->get('TeaAdmin\System\Config');
//        
//        $section = $config->getSection('web');
//        
//        $viewModel = new ViewModel();
//        $viewModel->setTemplate('tea-admin/config/edit');
//        $viewModel->setVariable('config', $config);
//        $viewModel->setVariable('section', $section);
//        return $viewModel;
        $this->redirect()->toRoute('admin/config/edit', array('section' => 'web'));
    }
    
    public function editAction()
    {
        $sectionName = $this->getEvent()->getRouteMatch()->getParam('section');
        
        $config = $this->getServiceLocator()->get('TeaAdmin\System\Config');
        $section = $config->getSection($sectionName);
        
        $form = $section->getForm();
        
        $values = $this->getServiceLocator()->get('TeaAdmin\Service\Config')->getConfigFromSection($section);
        $form->setData($values);
        
        if($this->getRequest()->isPost()) {
            $form->setData($this->getRequest()->getPost());
            
            if($form->isValid()) {
                $section->populate($this->getRequest()->getPost()->toArray());
                
                $this->getServiceLocator()->get('TeaAdmin\Service\Config')->saveSection($section);
                $this->redirect()->toRoute('admin/config/edit', array('section' => $sectionName));
            }
        }
        
        $viewModel = new ViewModel();
        $viewModel->setVariable('config', $config);
        $viewModel->setVariable('section', $section);
        $viewModel->setVariable('form', $form);
        return $viewModel;
    }
}