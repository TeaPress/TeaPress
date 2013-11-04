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
     * Display home page.
     * @return \Zend\View\Model\ViewModel
     */
    public function indexAction()
    {
        $categorys = $this->getServiceLocator()->get('TeaBlog\Service\Category')->getAllCategory();
        
        $viewModel = new ViewModel();
        $viewModel->setVariable('categorys', $categorys);
        $viewModel->setTemplate('tea-blog/admin/category/index');
        return $viewModel;
    }
}
