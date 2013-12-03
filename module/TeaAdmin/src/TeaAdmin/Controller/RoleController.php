<?php

namespace TeaAdmin\Controller;

use TeaAdmin\Controller\AbstractAdminActionController;
use Zend\View\Model\ViewModel;

class RoleController extends AbstractAdminActionController
{
    public function indexAction()
    {
        $rolesPaginator = $this->getServiceLocator()->get('TeaAdmin\Service\Role')->getAllRoles(true);
        $rolesPaginator->setCurrentPageNumber((int)$this->params()->fromQuery('page', 1));
        $rolesPaginator->setItemCountPerPage(15);
        
        $viewModel = new ViewModel();
        $viewModel->setVariable('roles', $rolesPaginator);
        return $viewModel;
    }
    
    public function newAction()
    {
        $form = $this->getServiceLocator()->get('FormElementManager')->get('TeaAdmin\Form\Role');
        
        if($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost();
            
            $form->setInputFilter(new \TeaAdmin\InputFilter\Role());
            $form->setData($data);
            
            if($form->isValid()) {
                $role = $form->getObject();
//                try {
                    $this->getServiceLocator()->get('TeaAdmin\Service\Role')->save($role);
                    
                    $this->flashMessenger()->addSuccessMessage('The role ' . $role->getRoleName() . ' has been saved.');
                    $this->redirect()->toRoute('admin/role');
//                } catch (\Exception $e) {
//                    $this->flashMessenger()->addErrorMessage('An error append during save role.');
//                }
            }
        }
        
        $viewModel = new ViewModel();
        $viewModel->setVariable('form', $form);
        return $viewModel;
    }
    
    public function editAction()
    {
        $roleId = $this->getEvent()->getRouteMatch()->getParam('id');
        
        $role = $this->getServiceLocator()->get('TeaAdmin\Service\Role')->getRoleById($roleId);
        if(!$role) {
            throw new \Zend\Mvc\Exception\InvalidArgumentException('Role with id ' . $roleId . ' do not exist');
        }
        
        $form = $this->getServiceLocator()->get('FormElementManager')->get('TeaAdmin\Form\Role');
        $form->bind($role);
        
        if($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost();
            
            $form->setInputFilter(new \TeaAdmin\InputFilter\Role());
            $form->setData($data);
            
            if($form->isValid()) {
                $role = $form->getObject();
                try {
                    $this->getServiceLocator()->get('TeaAdmin\Service\Role')->save($role);
                    
                    $this->flashMessenger()->addSuccessMessage('The role ' . $role->getRoleName() . ' has been saved.');
                    $this->redirect()->toRoute('admin/role');
                } catch (\Exception $e) {
                    $this->flashMessenger()->addErrorMessage('An error append during save role.');
                }
            }
        }
        
        $viewModel = new ViewModel();
        $viewModel->setVariable('form', $form);
        return $viewModel;
    }
}