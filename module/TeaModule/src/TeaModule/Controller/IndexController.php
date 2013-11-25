<?php

namespace TeaModule\Controller;

use TeaAdmin\Controller\AbstractAdminActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractAdminActionController
{
    public function indexAction()
    {
        $viewModel = new ViewModel();
        return $viewModel;
    }
    
    public function installAction()
    {
        $form = $this->getServiceLocator()->get('FormElementManager')->get('TeaModule\Form\Install');
        $form->prepare();
        
        if ($this->getRequest()->isPost()) {
            $data = array_merge_recursive(
                $this->getRequest()->getPost()->toArray(),
                $this->getRequest()->getFiles()->toArray()
            );
            
            $form->setInputFilter(new \TeaModule\InputFilter\Install());
            $form->setData($data);
            if ($form->isValid()) {
                $data = $form->getData();
                $phar = new \Phar($data['file']['tmp_name']);
                
                if($phar->hasMetadata()) {
                    $metadata = $phar->getMetadata();
                }
                
                // Check require metadata
                $phar->extractTo('./module/' . $metadata['module']);
                //
                // ...Save the form...
                //
                \Zend\Debug\Debug::dump($form->getData());
                //die();
            } else {
                //\Zend\Debug\Debug::dump($form->getMessages());
            }
        }
        
        $viewModel = new ViewModel();
        $viewModel->setVariable('form', $form);
        return $viewModel;
    }
    
    public function createAction()
    {
        $viewModel = new ViewModel();
        return $viewModel;
    }
}
