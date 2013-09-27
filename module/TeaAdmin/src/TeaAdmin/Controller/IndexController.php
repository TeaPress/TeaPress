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
        
        if($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost()->toArray();
            
            $form->setInputFilter(new \TeaAdmin\Form\InputFilter\Login());
            $form->setData($data);
            
            if($form->isValid()) {
                $authService = $this->getServiceLocator()->get('TeaAdmin\Authentication\Service');
                
                $adapter = $authService->getAdapter();
                $adapter->setIdentity($data['username']);
                $adapter->setCredential($data['password']);
                
                $adapter->authenticate();
                if(!$adapter->getResultRowObject()) {
                    $form->setMessages(array('Username or Password not valid.'));
                } else {
                    $object = $adapter->getResultRowObject(null, array('password'));
                    
                    // TODO Get role information ?
                    
                    $storage = $authService->getStorage();
                    $storage->write($object);
                    
                    return $this->redirect()->toRoute('admin');
                }   
            }
        }
        
        $viewModel = new ViewModel();
        $viewModel->setTerminal(true);
        $viewModel->setVariable('form', $form);
        return $viewModel;
    }
    
    /**
     * Clear authentication
     * @return void
     */
    public function logoutAction()
    {
        $this->getServiceLocator()->get('TeaAdmin\Authentication\Service')->clearIdentity();
        $this->redirect()->toRoute('admin/login');
    }
}
