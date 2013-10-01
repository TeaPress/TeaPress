<?php

namespace TeaAdmin\Controller;

use TeaAdmin\Controller\AbstractAdminActionController;
use Zend\View\Model\ViewModel;

class RoleController extends AbstractAdminActionController
{
    public function indexAction()
    {
        $config = $this->getServiceLocator()->get('Config');
        
        $list = $this->getServiceLocator()->get('TeaAdmin\Service\Role')->getAllRoles(true);
        $list->setCurrentPageNumber((int)$this->params()->fromQuery('page', 1));
        $list->setItemCountPerPage($config['tea-admin']['list']['itemCountPerPage']);
        
        $viewModel = new ViewModel();
        $viewModel->setVariable('roles', $list);
        return $viewModel;
    }
    
    public function newAction()
    {
        $form = $this->getServiceLocator()->get('FormElementManager')->get('TeaAdmin\Form\Role');
        
        if($this->getRequest()->isPost()) {
            $form->setInputFilter(new \TeaAdmin\Form\InputFilter\Role());
            $form->setValidationGroup('name', 'token', 'submit');
            $form->setData($this->getRequest()->getPost());
            
            if($form->isValid()) {
                $role = $form->getObject();
                try {
                    $this->getServiceLocator()->get('TeaAdmin\Service\Role')->save($role);
                    
                    $this->flashMessenger()->addSuccessMessage('The role has been saved.');
                    $this->redirect()->toRoute('admin/role');
                } catch (\Exception $e) {
                    throw new \Exception($e);
                    $this->flashMessenger()->addErrorMessage('An error append during save role.');
                }
            }
        }
        
        $viewModel = new ViewModel();
        $viewModel->setVariable('form', $form);
        return $viewModel;
    }
    
    public function editAction()
    {
        $role_id = $this->getEvent()->getRouteMatch()->getParam('id');
        
        $role = $this->getServiceLocator()->get('TeaAdmin\Service\Role')->getRoleById($role_id);
        if(!$role) {
            throw new \Zend\Mvc\Exception\InvalidArgumentException('Role with id ' . $role_id . ' do not exist');
        }
        
        $form = $this->getServiceLocator()->get('FormElementManager')->get('TeaAdmin\Form\Role');
        $form->bind($role);
        
        if($this->getRequest()->isPost()) {
            $inputFilter = new \TeaAdmin\Form\InputFilter\Role();
            $inputFilter->remove('name');
            $inputFilter->add(array(
                'name' => 'name',
                'required' => true,
                'validators' => array(
                    array(
                        'name' => 'Zend\Validator\Db\NoRecordExists',
                        'options' => array(
                            'table' => 'admin_role',
                            'field' => 'name',
                            'adapter' => \Zend\Db\TableGateway\Feature\GlobalAdapterFeature::getStaticAdapter(),
                            'exclude' =>array(
                                'field' => 'role_id',
                                'value' => $role->getRoleId(),
                            )
                        )
                    )
                )
            ));
            $form->setInputFilter($inputFilter);
            $form->setValidationGroup('roleId', 'name', 'token', 'submit');
            
            $form->setData($this->getRequest()->getPost());
            
            if($form->isValid()) {
                $role = $form->getObject();
                try {
                    $this->getServiceLocator()->get('TeaAdmin\Service\Role')->save($role);
                    
                    $this->flashMessenger()->addSuccessMessage('The role has been saved.');
                    $this->redirect()->toRoute('admin/role');
                } catch (\Exception $e) {
                    throw new \Exception($e);
                    $this->flashMessenger()->addErrorMessage('An error append during save role.');
                }
            }
        }
        
        $viewModel = new ViewModel();
        $viewModel->setVariable('form', $form);
        return $viewModel;
    }
}