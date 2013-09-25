<?php
return array(
    'service_manager' => array(
        'invokables' => array(
            // services
            'TeaAdmin\Service\User' => 'TeaAdmin\Service\User',
            'TeaAdmin\Service\Role' => 'TeaAdmin\Service\Role',
            'TeaAdmin\Service\Rule' => 'TeaAdmin\Service\Rule',
            'TeaAdmin\Service\Log'  => 'TeaAdmin\Service\Log',
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'TeaAdmin\Controller\Index' => 'TeaAdmin\Controller\IndexController',
        ),
    ),
    'view_manager' => array(
        'template_map' => array(
            'layout/admin_layout'            => __DIR__ . '/../view/layout/layout.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
);