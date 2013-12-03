<?php

namespace TeaAdmin\InputFilter;

use TakeATea\InputFilter\AbstractInputFilter;

class User extends AbstractInputFilter
{
    public function __construct()
    {
        $this->add(array(
            'name' => 'username',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'Zend\Validator\Db\NoRecordExists',
                    'options' => array(
                        'table' => 'admin_user',
                        'field' => 'username',
                        'adapter' => \Zend\Db\TableGateway\Feature\GlobalAdapterFeature::getStaticAdapter(),
                    )
                )
            )
        ));
        
        $this->add(array(
            'name' => 'userFirstname',
            'required' => true,
        ));
        
        $this->add(array(
            'name' => 'userLastname',
            'required' => true,
        ));
        
        $this->add(array(
            'name' => 'userEmail',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'Zend\Validator\EmailAddress',
                    'options' => array(
                        'allow' => \Zend\Validator\Hostname::ALLOW_DNS,
                        'useMxCheck'    => false,
                        'useDeepMxCheck'  => true
                    )
                )
            )
        ));
        
        $this->add(array(
            'name' => 'userContent',
            'required' => false,
        ));
        
        $this->add(array(
            'name' => 'userGoogle',
            'required' => false,
        ));
        
        $this->add(array(
            'name' => 'userFacebook',
            'required' => false,
        ));
        
        $this->add(array(
            'name' => 'userTwitter',
            'required' => false,
        ));
        
        $this->add(array(
            'name' => 'roleId',
            'required' => true,
        ));
        
        $this->add(array(
            'name' => 'userStatus',
            'required' => true,
        ));

        $this->add(array(
            'name' => 'userPassword',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'string_length',
                    'options' => array(
                        'min' => 6
                    ),
                ),
            ),
        ));
        
        $this->add(array(
            'name' => 'userConfirm',
            'required' => true,
            'validators' => array(
                array(
                    'name'    => 'Zend\Validator\Identical',
                    'options' => array(
                        'token' => 'userPassword',
                    ),
                )
            )
        ));
    }
}