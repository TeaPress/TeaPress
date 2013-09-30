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
        $form = $this->getServiceLocator()->get('FormElementManager')->get('TeaAdmin\Form\User');
        
        if($this->getRequest()->isPost()) {
            $form->setInputFilter(new \TeaAdmin\Form\InputFilter\User());
            $form->setValidationGroup('username', 'firstname', 'lastname', 'email', 'roleId', 'status', 'password', 'confirm', 'submit');
            $form->setData($this->getRequest()->getPost());
            
            if($form->isValid()) {
                $user = $form->getObject();
                
                try {
                    $this->getServiceLocator()->get('TeaAdmin\Service\User')->save($user);
                
                    $this->flashMessenger()->addSuccessMessage('The user has been saved.');
                } catch (\Exception $e) {
                    $this->flashMessenger()->addErrorMessage('An error append during save user.');
                }
            }
        }
        
        $viewModel = new ViewModel();
        $viewModel->setVariable('form', $form);
        return $viewModel;
    }
    
    public function editAction()
    {
//            if($this->getRequest()->getPost('password') || $this->getRequest()->getPost('password')) {
//                $form->setValidationGroup('username', 'firsname', 'lastname', 'email', 'password', 'confirm', 'submit');
//            } else {
//                
//            } 
    }
    
    
}