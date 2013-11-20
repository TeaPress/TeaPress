<?php

namespace TeaModule\Controller;

use TeaAdmin\Controller\AbstractAdminActionController;
use Zend\View\Model\ViewModel;
use Zend\View\Model\JsonModel;

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
                //
                // ...Save the form...
                //
                //Debug::dump($form->getData());
                //die();
            }
        }
        
        $viewModel = new ViewModel();
        $viewModel->setVariable('form', $form);
        return $viewModel;
    }
    
    public function progressAction()
    {
        $id = $this->params()->fromQuery('id', null);
        $progress = new \Zend\ProgressBar\Upload\ApcProgress();

        $jsonModel = new JsonModel(array(
            'id' => $id,
            'status' => $progress->getProgress($id),
        ));
        return $jsonModel;
    }
    
    public function createAction()
    {
        $viewModel = new ViewModel();
        return $viewModel;
    }
}
