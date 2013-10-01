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
            $form->setValidationGroup('username', 'firstname', 'lastname', 'email', 'roleId', 'isActive', 'password', 'confirm', 'token', 'submit');
            $form->setData($this->getRequest()->getPost());
            
            if($form->isValid()) {
                $user = $form->getObject();
                try {
                    $this->getServiceLocator()->get('TeaAdmin\Service\User')->save($user);
                    
                    $this->flashMessenger()->addSuccessMessage('The user has been saved.');
                    $this->redirect()->toRoute('admin/user');
                } catch (\Exception $e) {
                    throw new \Exception($e);
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
        $user_id = $this->getEvent()->getRouteMatch()->getParam('id');
        
        $user = $this->getServiceLocator()->get('TeaAdmin\Service\User')->getUserById($user_id);
        if(!$user) {
            throw new \Zend\Mvc\Exception\InvalidArgumentException('User with id ' . $user_id . ' do not exist');
        }
        
        $form = $this->getServiceLocator()->get('FormElementManager')->get('TeaAdmin\Form\User');
        $form->bind($user);
        
        if($this->getRequest()->isPost()) {
            $inputFilter = new \TeaAdmin\Form\InputFilter\User();
            $inputFilter->remove('username');
            $inputFilter->add(array(
                'name' => 'username',
                'required' => true,
                'validators' => array(
                    array(
                        'name' => 'Zend\Validator\Db\NoRecordExists',
                        'options' => array(
                            'table' => 'admin_user',
                            'field' => 'username',
                            'adapter' => \Zend\Db\TableGateway\Feature\GlobalAdapterFeature::getStaticAdapter(),
                            'exclude' =>array(
                                'field' => 'user_id',
                                'value' => $user->getUserId(),
                            )
                        )
                    )
                )
            ));
            $form->setInputFilter($inputFilter);
            
            if($this->getRequest()->getPost('password') || $this->getRequest()->getPost('confirm')) {
                $form->setValidationGroup('userId', 'username', 'firstname', 'lastname', 'email', 'roleId', 'isActive', 'password', 'confirm', 'token', 'submit');
            } else {
                $form->setValidationGroup('userId', 'username', 'firstname', 'lastname', 'email', 'roleId', 'isActive', 'token', 'submit');
            }
            
            $form->setData($this->getRequest()->getPost());
            
            if($form->isValid()) {
                $user = $form->getObject();
                try {
                    $this->getServiceLocator()->get('TeaAdmin\Service\User')->save($user);
                    
                    $this->flashMessenger()->addSuccessMessage('The user has been saved.');
                    $this->redirect()->toRoute('admin/user');
                } catch (\Exception $e) {
                    throw new \Exception($e);
                    $this->flashMessenger()->addErrorMessage('An error append during save user.');
                }
            }
        }
        
        $viewModel = new ViewModel();
        $viewModel->setVariable('form', $form);
        return $viewModel;
//            if($this->getRequest()->getPost('password') || $this->getRequest()->getPost('password')) {
//                $form->setValidationGroup('username', 'firsname', 'lastname', 'email', 'password', 'confirm', 'submit');
//            } else {
//                
//            } 
    }
    
    
}