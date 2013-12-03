<?php

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
        $categoriesPaginator = $this->getServiceLocator()->get('TeaBlog\Service\Category')->getAllCategory(true);
        $categoriesPaginator->setCurrentPageNumber((int)$this->params()->fromQuery('page', 1));
        $categoriesPaginator->setItemCountPerPage(15);
        
        $viewModel = new ViewModel();
        $viewModel->setVariable('categories', $categoriesPaginator);
        return $viewModel;
    }
    
    public function newAction()
    {
        $form = $this->getServiceLocator()->get('FormElementManager')->get('TeaBlogAdmin\Form\Category');
        
        if($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost();
            
            // Get title for slug and apply filter.
            if($data['categorySlug'] == '') {
                $data['categorySlug'] = $data['categoryTitle'];
            }
            
            $form->setInputFilter(new \TeaBlogAdmin\InputFilter\Category());
            $form->setData($data);
            
            if($form->isValid()) {
                $category = $form->getObject();
                
                try {
                    $this->getServiceLocator()->get('TeaBlog\Service\Category')->save($category);
                    
                    $this->flashMessenger()->addSuccessMessage('Your category ' . $category->getCategoryTitle() . ' has been saved.');
                    $this->redirect()->toRoute('admin/blog/category');
                } catch (\Exception $e) {
                    $this->flashMessenger()->addErrorMessage('An error append during save your category.');
                }
            }
        }
        
        $viewModel = new ViewModel();
        $viewModel->setVariable('form', $form);
        return $viewModel;
    }
    
    public function editAction()
    {
        $categoryId = $this->getEvent()->getRouteMatch()->getParam('id');
        
        $category = $this->getServiceLocator()->get('TeaBlog\Service\Category')->getCategoryById($categoryId);
        if(!$category) {
            throw new \Zend\Mvc\Exception\InvalidArgumentException('Category with id ' . $categoryId . ' do not exist');
        }
        
        $form = $this->getServiceLocator()->get('FormElementManager')->get('TeaBlogAdmin\Form\Category');
        $form->bind($category);
        
        if($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost();
            
            // Get title for slug and apply filter.
            if($data['categorySlug'] == '') {
                $data['categorySlug'] = $data['categoryTitle'];
            }
            
            $form->setInputFilter(new \TeaBlogAdmin\InputFilter\Category());
            $form->setData($data);
            
            if($form->isValid()) {
                $category = $form->getObject();
                
                try {
                    $this->getServiceLocator()->get('TeaBlog\Service\Category')->save($category);
                    
                    $this->flashMessenger()->addSuccessMessage('Your category ' . $category->getCategoryTitle() . ' has been saved.');
                    $this->redirect()->toRoute('admin/blog/category');
                } catch (\Exception $e) {
                    $this->flashMessenger()->addErrorMessage('An error append during save your category.');
                }
            }
        }
        
        $viewModel = new ViewModel();
        $viewModel->setVariable('form', $form);
        return $viewModel;
    }
}
