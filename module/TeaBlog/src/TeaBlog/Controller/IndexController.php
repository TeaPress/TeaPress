<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace TeaBlog\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    /**
     * Display home page.
     * @return \Zend\View\Model\ViewModel
     */
    public function indexAction()
    {
        $config = $this->getServiceLocator()->get('Config');
        
        $postsPaginator = $this->getServiceLocator()->get('TeaBlog\Service\Post')->getAllPosts(true);
        $postsPaginator->setCurrentPageNumber((int)$this->params()->fromQuery('page', 1));
        $postsPaginator->setItemCountPerPage($config['blog']['list']['itemCountPerPage']);
        
        $viewModel = new ViewModel();
        $viewModel->setVariable('posts', $postsPaginator);
        return $viewModel;
    }
}
