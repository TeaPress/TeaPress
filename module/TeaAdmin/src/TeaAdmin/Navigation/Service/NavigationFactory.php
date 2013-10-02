<?php

namespace TeaAdmin\Navigation\Service;

use Zend\Navigation\Service\AbstractNavigationFactory;

class NavigationFactory extends AbstractNavigationFactory
{
    /**
     * @return string
     */
    protected function getName() {
        return 'tea-admin';
    }    
}