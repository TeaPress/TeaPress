<?php
return array(
    'service_manager' => array(
        'factories' => array(
            'TeaCore\System\Config' => 'TeaCore\System\ConfigFactory',
        ),
        'invokables' => array(
            // service
            'TeaCore\Service\Config'  => 'TeaCore\Service\Config',
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'TeaCore\Controller\Config' => 'TeaCore\Controller\ConfigController',
        ),
    ),
    'view_manager' => array(
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
);