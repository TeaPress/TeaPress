<?php

namespace TeaAdmin\InputFilter;

use TakeATea\InputFilter\AbstractInputFilter;

class Role extends AbstractInputFilter
{
    public function __construct()
    {
        $this->add(array(
            'name' => 'roleName',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'Zend\Validator\Db\NoRecordExists',
                    'options' => array(
                        'table' => 'admin_role',
                        'field' => 'role_name',
                        'adapter' => \Zend\Db\TableGateway\Feature\GlobalAdapterFeature::getStaticAdapter(),
                    )
                )
            )
        ));
        
        $this->add(array(
            'name' => 'roleContent',
            'required' => false
        ));
    }
}