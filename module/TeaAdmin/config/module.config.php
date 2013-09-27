<?php
return array(
    'service_manager' => array(
        'factories' => array(
            'TeaAdmin\Authentication\Service' => 'TeaAdmin\Authentication\AuthenticationFactory',
            'TeaAdmin\Authentication\Adapter' => 'TeaAdmin\Authentication\Adapter\AdapterFactory',
            'TeaAdmin\Authentication\Storage' => 'TeaAdmin\Authentication\Storage\StorageFactory',
            'TeaAdminNavigation' => 'TeaAdmin\Navigation\Service\TeaAdminNavigationFactory',
        ),
        'invokables' => array(
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
            'tea-admin/menu'                 => __DIR__ . '/../view/partial/menu.phtml'
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
);