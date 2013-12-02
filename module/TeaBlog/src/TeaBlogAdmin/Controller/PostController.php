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
            $data = $this->getRequest()->getPost();
            
            // Get title for slug and apply filter.
            if($data['postSlug'] == '') {
                $data['postSlug'] = $data['postTitle'];
            }
            
            $form->setInputFilter(new \TeaBlogAdmin\InputFilter\Post());
            $form->setData($this->getRequest()->getPost());
            
            if($form->isValid()) {
                $post = $form->getObject();
                
                try {
                    $this->getServiceLocator()->get('TeaBlog\Service\Post')->save($post);
                    
                    $this->flashMessenger()->addSuccessMessage('Your post ' . $post->getPostTitle() . ' has been saved.');
                    $this->redirect()->toRoute('admin/blog/post');
                } catch (\Exception $e) {
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
        $postId = $this->getEvent()->getRouteMatch()->getParam('id');
        
        $post = $this->getServiceLocator()->get('TeaBlog\Service\Post')->getPostById($postId);
        if(!$post) {
            throw new \Zend\Mvc\Exception\InvalidArgumentException('Post with id ' . $postId . ' do not exist');
        }
        
        $form = $this->getServiceLocator()->get('FormElementManager')->get('TeaBlogAdmin\Form\Post');
        $form->bind($post);
        
        if($this->getRequest()->isPost()) {
            $data = $this->getRequest()->getPost();
            
            // Get title for slug and apply filter.
            if($data['postSlug'] == '') {
                $data['postSlug'] = $data['postTitle'];
            }
            
            $form->setInputFilter(new \TeaBlogAdmin\InputFilter\Post());
            $form->setData($data);
            
            if($form->isValid()) {
                $post = $form->getObject();
                
                try {
                    $this->getServiceLocator()->get('TeaBlog\Service\Post')->save($post);
                    
                    $this->flashMessenger()->addSuccessMessage('Your post ' . $post->getPostTitle() . ' has been saved.');
                    $this->redirect()->toRoute('admin/blog/post');
                } catch (\Exception $e) {
                    $this->flashMessenger()->addErrorMessage('An error append during save post.');
                }
            }
        }
        
        $viewModel = new ViewModel();
        $viewModel->setVariable('form', $form);
        return $viewModel;
    }
}
