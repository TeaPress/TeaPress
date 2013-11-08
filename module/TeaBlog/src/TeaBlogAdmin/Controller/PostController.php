<?php

namespace TeaBlogAdmin\Controller;

use TeaAdmin\Controller\AbstractAdminActionController;
use Zend\View\Model\ViewModel;

class PostController extends AbstractAdminActionController
{
    /**
     * Display posts list.
     * @return \Zend\View\Model\ViewModel
     */
    public function indexAction()
    {
        $postsPaginator = $this->getServiceLocator()->get('TeaBlog\Service\Post')->getAllPosts(true);
        $postsPaginator->setCurrentPageNumber((int)$this->params()->fromQuery('page', 1));
        $postsPaginator->setItemCountPerPage(15);
        
        $viewModel = new ViewModel();
        $viewModel->setVariable('posts', $postsPaginator);
        return $viewModel;
    }
    
    public function newAction()
    {
        $form = $this->getServiceLocator()->get('FormElementManager')->get('TeaBlogAdmin\Form\Post');
        
        if($this->getRequest()->isPost()) {
            $form->setInputFilter(new \TeaBlogAdmin\InputFilter\Post());
            $form->setValidationGroup('title', 'urlKey', 'categoryId', 'description', 'token', 'submit');
            $form->setData($this->getRequest()->getPost());
            
            if($form->isValid()) {
                $post = $form->getObject();
                
                try {
                    $this->getServiceLocator()->get('TeaBlog\Service\Post')->save($post);
                    
                    $this->flashMessenger()->addSuccessMessage('The post has been saved.');
                    $this->redirect()->toRoute('admin/blog/post');
                } catch (\Exception $e) {
                    throw new \Exception($e);
                    $this->flashMessenger()->addErrorMessage('An error append during save post.');
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
