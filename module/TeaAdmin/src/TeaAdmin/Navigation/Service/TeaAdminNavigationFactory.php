<?php

namespace TeaAdmin\Navigation\Service;

use Zend\Navigation\Service\AbstractNavigationFactory;

class TeaAdminNavigationFactory extends AbstractNavigationFactory
{
    /**
     * @return string
     */
    protected function getName() {
        return 'tea-admin';
    }    
}