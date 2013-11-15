<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace TeaBlogAdmin\Controller;

use TeaAdmin\Controller\AbstractAdminActionController;
use Zend\View\Model\ViewModel;

class CategoryController extends AbstractAdminActionController
{
    /**
     * Display category list.
     * @return \Zend\View\Model\ViewModel
     */
    public function indexAction()
    {
        $categories = $this->getServiceLocator()->get('TeaBlog\Service\Category')->getAllCategory(true);
        $form = $this->getServiceLocator()->get('FormElementManager')->get('TeaBlogAdmin\Form\Category');
        
        if($this->getRequest()->isPost()) {
            $form->setInputFilter(new \TeaBlogAdmin\InputFilter\Category());
            $form->setValidationGroup('title', 'parentId', 'token', 'submit');
            $form->setData($this->getRequest()->getPost());
            
            if($form->isValid()) {
                $category = $form->getObject();
                
                // Save null if no parent.
                if($category->getParentId() == '') {
                    $category->setParentId(null);
                }
                
                try {
                    $this->getServiceLocator()->get('TeaBlog\Service\Category')->save($category);
                    
                    $this->flashMessenger()->addSuccessMessage('The category has been saved.');
                    $this->redirect()->toRoute('admin/blog/category');
                } catch (\Exception $e) {
                    throw new \Exception($e);
                    $this->flashMessenger()->addErrorMessage('An error append during save category.');
                }
            }
        }
        
        $viewModel = new ViewModel();
        $viewModel->setVariable('categories', $categories);
        $viewModel->setVariable('form', $form);
        return $viewModel;
    }
    
    public function newAction()
    {
        $form = $this->getServiceLocator()->get('FormElementManager')->get('TeaBlogAdmin\Form\Category');
        
        if($this->getRequest()->isPost()) {
            $form->setInputFilter(new \TeaBlogAdmin\InputFilter\Category());
            $form->setValidationGroup('title', 'urlKey', 'parentId', 'description', 'token', 'submit');
            $form->setData($this->getRequest()->getPost());
            
            if($form->isValid()) {
                $category = $form->getObject();
                
                // Save null if no parent.
                if($category->getParentId() == '') {
                    $category->setParentId(null);
                }
                
                try {
                    $this->getServiceLocator()->get('TeaBlog\Service\Category')->save($category);
                    
                    $this->flashMessenger()->addSuccessMessage('The category has been saved.');
                    $this->redirect()->toRoute('admin/blog/category');
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
        $category_id = $this->getEvent()->getRouteMatch()->getParam('id');
        
        $category = $this->getServiceLocator()->get('TeaBlog\Service\Category')->getCategoryById($category_id);
        if(!$category) {
            throw new \Zend\Mvc\Exception\InvalidArgumentException('Category with id ' . $category_id . ' do not exist');
        }
        
        $form = $this->getServiceLocator()->get('FormElementManager')->get('TeaBlogAdmin\Form\Category');
        $form->bind($category);
        
        if($this->getRequest()->isPost()) {
            $form->setInputFilter(new \TeaBlogAdmin\InputFilter\Category());
            $form->setValidationGroup('categoryId', 'title', 'urlKey', 'parentId', 'description', 'token', 'submit');
            $form->setData($this->getRequest()->getPost());
            
            if($form->isValid()) {
                $category = $form->getObject();
                
                // Save null if no parent.
                if($category->getParentId() == '') {
                    $category->setParentId(null);
                }
                
                try {
                    $this->getServiceLocator()->get('TeaBlog\Service\Category')->save($category);
                    
                    $this->flashMessenger()->addSuccessMessage('The category has been saved.');
                    $this->redirect()->toRoute('admin/blog/category');
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
}
