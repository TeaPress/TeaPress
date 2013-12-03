<?php

namespace TeaAdmin\Controller;

use TeaAdmin\Controller\AbstractAdminActionController;
use Zend\View\Model\ViewModel;

class UserController extends AbstractAdminActionController
{
    public function indexAction()
    {
        $usersPaginator = $this->getServiceLocator()->get('TeaAdmin\Service\User')->getAllUsers(true);
        $usersPaginator->setCurrentPageNumber((int)$this->params()->fromQuery('page', 1));
        $usersPaginator->setItemCountPerPage(15);
        
        $viewModel = new ViewModel();
        $viewModel->setVariable('users', $usersPaginator);
        return $viewModel;
    }
    
    public function newAction()
    {
        $form = $this->getServiceLocator()->get('FormElementManager')->get('TeaAdmin\Form\User');
        
        if($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost();
            
            $form->setInputFilter(new \TeaAdmin\InputFilter\User());
            $form->setData($data);
            
            if($form->isValid()) {
                $user = $form->getObject();
                
                try {
                    $this->getServiceLocator()->get('TeaAdmin\Service\User')->save($user);
                    
                    $this->flashMessenger()->addSuccessMessage('The user ' . $user->getUsername() . ' has been saved.');
                    $this->redirect()->toRoute('admin/user');
                } catch (\Exception $e) {
                    $this->flashMessenger()->addErrorMessage('An error append during saving user.');
                }
            }
        }
        
        $viewModel = new ViewModel();
        $viewModel->setVariable('form', $form);
        return $viewModel;
    }
    
    public function editAction()
    {
        $userId = $this->getEvent()->getRouteMatch()->getParam('id');
        
        $user = $this->getServiceLocator()->get('TeaAdmin\Service\User')->getUserById($userId);
        if(!$user) {
            throw new \Zend\Mvc\Exception\InvalidArgumentException('User with id ' . $userId . ' do not exist');
        }
        
        $form = $this->getServiceLocator()->get('FormElementManager')->get('TeaAdmin\Form\User');
        $form->bind($user);
        
        if($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost();
            
            if(!$this->getRequest()->getPost('password') && !$this->getRequest()->getPost('confirm')) {
                $form->setValidationGroup('username', 'userFirstname', 'userLastname', 'userEmail', 'userContent', 'userGoogle', 'userFacebook', 'userTwitter', 'userStatus', 'roleId', 'token', 'submit');
            }
            
            $form->setData($data);
            
            if($form->isValid()) {
                $user = $form->getObject();
                try {
                    $this->getServiceLocator()->get('TeaAdmin\Service\User')->save($user);
                    
                    $this->flashMessenger()->addSuccessMessage('The user ' . $user->getUsername() . ' has been saved.');
                    $this->redirect()->toRoute('admin/user');
                } catch (\Exception $e) {
                    $this->flashMessenger()->addErrorMessage('An error append during saving user.');
                }
            }
        }
        
        $viewModel = new ViewModel();
        $viewModel->setVariable('form', $form);
        return $viewModel;
    }
    
    
}