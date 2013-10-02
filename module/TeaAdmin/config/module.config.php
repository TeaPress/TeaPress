<?php
return array(
    'service_manager' => array(
        'factories' => array(
            'TeaAdmin\Authentication\Service' => 'TeaAdmin\Authentication\AuthenticationFactory',
            'TeaAdmin\Authentication\Adapter' => 'TeaAdmin\Authentication\Adapter\AdapterFactory',
            'TeaAdmin\Authentication\Storage' => 'TeaAdmin\Authentication\Storage\StorageFactory',
            'TeaAdmin\Navigation\Service\Navigation' => 'TeaAdmin\Navigation\Service\NavigationFactory',
            'TeaAdmin\Permissions\Service\Acl' => 'TeaAdmin\Permissions\Service\AclFactory'
        ),
        'invokables' => array(
            // service
            'TeaAdmin\Service\User' => 'TeaAdmin\Service\User',
            'TeaAdmin\Service\Role' => 'TeaAdmin\Service\Role',
            'TeaAdmin\Service\Rule' => 'TeaAdmin\Service\Rule',
            'TeaAdmin\Service\Log'  => 'TeaAdmin\Service\Log',
        )
    ),
    'form_elements' => array(
        'invokables' => array(
            'TeaAdmin\Form\User' => 'TeaAdmin\Form\User',
            'TeaAdmin\Form\Role' => 'TeaAdmin\Form\Role',
        )
    ),
    'controllers' => array(
        'invokables' => array(
            'TeaAdmin\Controller\Index' => 'TeaAdmin\Controller\IndexController',
            'TeaAdmin\Controller\User' => 'TeaAdmin\Controller\UserController',
            'TeaAdmin\Controller\Role' => 'TeaAdmin\Controller\RoleController',
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