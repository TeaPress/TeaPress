<?php

namespace TeaAdmin\InputFilter;

use TakeATea\InputFilter\AbstractInputFilter;

class Role extends AbstractInputFilter
{
    public function __construct()
    {
        $this->add(array(
            'name' => 'roleId',
            'required' => true,
        ));
        
        $this->add(array(
            'name' => 'name',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'Zend\Validator\Db\NoRecordExists',
                    'options' => array(
                        'table' => 'admin_role',
                        'field' => 'name',
                        'adapter' => \Zend\Db\TableGateway\Feature\GlobalAdapterFeature::getStaticAdapter(),
                    )
                )
            )
        ));
    }
}