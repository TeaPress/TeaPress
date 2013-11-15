<?php

namespace TakeATea\Service;

use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\EventManager\EventManagerInterface;
use Zend\EventManager\EventManagerAwareInterface;

abstract class AbstractService implements ServiceLocatorAwareInterface, EventManagerAwareInterface
{
    protected $mapper;
    
    protected $paginator;
    
    protected $eventManager;
    
    protected $serviceLocator;
    
    /**
     * Get the Mapper associate to this service
     * @return Object
     */
    protected function getMapper()
    {
        if (is_string($this->mapper)) {
            $this->mapper = $this->getServiceLocator()->get($this->mapper);
        }
        return $this->mapper;
    }

    /**
     * Set service locator
     * @param \Zend\ServiceManager\ServiceLocatorInterface $serviceLocator
     * @return \Orange\Common\Service\AbstractService
     */
    public function setServiceLocator(ServiceLocatorInterface $serviceLocator)
    {
        $this->serviceLocator = $serviceLocator;
        return $this;
    }
    
    /**
     * Get service locator
     * @return \Zend\ServiceManager\ServiceLocatorInterface
     */
    public function getServiceLocator()
    {
        return $this->serviceLocator;
    }

    /**
     * Use paginator
     * @param array $options
     * @return \Orange\Common\Service\AbstractService
     */
    public function usePaginator($usePaginator = true)
    {
        $this->getMapper()->usePaginator($usePaginator);
        return $this;
    }
    
    /**
     * Get Paginator
     * @return \Orange\Common\Service\Paginator
     */
    public function getPaginator()
    {
        return $this->paginator;
    }
    
    /**
     * Set paginator
     * @param \Orange\Common\Service\Paginator $paginator
     * @return \Orange\Common\Service\AbstractService
     */
    public function setPaginator(Paginator $paginator)
    {
        $this->paginator = $paginator;
        return $this;
    }
    
    /**
     * Get Event Manager
     * @return eventManager
     */
    public function getEventManager()
    {
        return $this->eventManager;
    }

    /**
     * Set Event Manager
     * @param $eventManager
     * @return self
     */
    public function setEventManager(EventManagerInterface $eventManager)
    {
        $eventManager->setIdentifiers(array(
            __CLASS__,
            get_called_class(),
        ));
        $this->eventManager = $eventManager;
        return $this;
    }
}