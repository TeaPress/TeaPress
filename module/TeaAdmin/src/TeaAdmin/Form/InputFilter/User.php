<?php

namespace TeaAdmin\Form\InputFilter;

use TakeATea\InputFilter\AbstractInputFilter;

class User extends AbstractInputFilter
{
    public function __construct()
    {
        $this->add(array(
            'name' => 'userId',
            'required' => true,
        ));
        
        $exclude = '';
        if($this->getRawValue('userId') != null) {
            $exclude = array('exclude' =>array(
                'field' => 'user_id',
                'value' => $this->getRawValue('userId'),
            ));
        }
        
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
                        $exclude
                    )
                )
            )
        ));
        
        $this->add(array(
            'name' => 'firstname',
            'required' => true,
        ));
        
        $this->add(array(
            'name' => 'lastname',
            'required' => true,
        ));
        
        $this->add(array(
            'name' => 'email',
            'required' => true,
            'validators' => array(
                array(
                    'name' => 'Zend\Validator\EmailAddress',
                    'options' => array(
                        'allow' => \Zend\Validator\Hostname::ALLOW_DNS,
                        'useMxCheck'    => true,
                        'useDeepMxCheck'  => true
                    )
                )
            )
        ));
        
        $this->add(array(
            'name' => 'roleId',
            'required' => true,
        ));
        
        $this->add(array(
            'name' => 'isActive',
            'required' => true,
        ));

        $this->add(array(
            'name' => 'password',
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
            'name' => 'confirm',
            'required' => true,
            'validators' => array(
                array(
                    'name'    => 'Zend\Validator\Identical',
                    'options' => array(
                        'token' => 'password',
                    ),
                )
            )
        ));
    }
}