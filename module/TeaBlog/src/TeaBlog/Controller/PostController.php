<?php

namespace TeaBlog\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class PostController extends AbstractActionController
{
    /**
     * Display posts from a category with paginator
     * @return \Zend\View\Model\ViewModel
     */
    public function categoryAction()
    {
        $slug = $this->getEvent()->getRouteMatch()->getParam('slug');
        if(!$slug){
            $this->getResponse()->setStatusCode(404);
            return;
        }
        
        $category = $this->getServiceLocator()->get('TeaBlog\Service\Category')->getCategoryFromSlug($slug);
        if(!$category) {
            $this->getResponse()->setStatusCode(404);
            return;
        }
        
        $config = $this->getServiceLocator()->get('Config');
        $postsPaginator = $this->getServiceLocator()->get('TeaBlog\Service\Post')->getPostsFromCategorySlug($slug, true);
        $postsPaginator->setCurrentPageNumber((int)$this->params()->fromQuery('page', 1));
        $postsPaginator->setItemCountPerPage($config['blog']['list']['itemCountPerPage']);
        
        $viewModel = new ViewModel();
        $viewModel->setVariable('category', $category);
        $viewModel->setVariable('posts', $postsPaginator);
        return $viewModel;
    }
    
    /**
     * Display post
     * @return \Zend\View\Model\ViewModel
     */
    public function singleAction()
    {
        $name = $this->getEvent()->getRouteMatch()->getParam('name');
        if(!$name){
            $this->getResponse()->setStatusCode(404);
            return;
        }
        
        $post = $this->getServiceLocator()->get('TeaBlog\Service\Post')->getPostBySlug($name);
        if(!$post) {
            $this->getResponse()->setStatusCode(404);
            return;
        }
        
        $viewModel = new ViewModel();
        $viewModel->setVariable('post', $post);
        return $viewModel;
    }
}
