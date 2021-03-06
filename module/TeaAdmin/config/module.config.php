<?php
return array(
    'service_manager' => array(
        'factories' => array(
            'TeaAdmin\Authentication\Service' => 'TeaAdmin\Authentication\AuthenticationFactory',
            'TeaAdmin\Authentication\Adapter' => 'TeaAdmin\Authentication\Adapter\AdapterFactory',
            'TeaAdmin\Authentication\Storage' => 'TeaAdmin\Authentication\Storage\StorageFactory',
            'TeaAdmin\Navigation\Service\Navigation' => 'TeaAdmin\Navigation\Service\NavigationFactory',
            'TeaAdmin\Permissions\Service\Acl' => 'TeaAdmin\Permissions\Service\AclFactory',
            'TeaAdmin\System\Config' => 'TeaAdmin\System\ConfigFactory',
        ),
        'invokables' => array(
            // service
            'TeaAdmin\Service\User' => 'TeaAdmin\Service\User',
            'TeaAdmin\Service\Role' => 'TeaAdmin\Service\Role',
            'TeaAdmin\Service\Rule' => 'TeaAdmin\Service\Rule',
            'TeaAdmin\Service\Config'  => 'TeaAdmin\Service\Config',
            'TeaAdmin\Service\Log'  => 'TeaAdmin\Service\Log',
        ),
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
        ),
        'aliases' => array(
            'TeaAdminNavigation' => 'TeaAdmin\Navigation\Service\Navigation',
        ),
    ),
    'form_elements' => array(
        'invokables' => array(
            'TeaAdmin\Form\User' => 'TeaAdmin\Form\User',
            'TeaAdmin\Form\Role' => 'TeaAdmin\Form\Role',
        )
    ),
    'view_helpers' => array(
        'invokables' => array(
            'formdescription' => 'TeaAdmin\Form\View\Helper\FormDescription',
            'formlabel' => 'TeaAdmin\Form\View\Helper\FormLabel',
        )
    ),
    'filter' => array(
        'invokables' => array(
            'slug' => 'TeaAdmin\Filter\Slug'
        )
    ),
    'controllers' => array(
        'invokables' => array(
            'TeaAdmin\Controller\Index' => 'TeaAdmin\Controller\IndexController',
            'TeaAdmin\Controller\User' => 'TeaAdmin\Controller\UserController',
            'TeaAdmin\Controller\Role' => 'TeaAdmin\Controller\RoleController',
            'TeaAdmin\Controller\Cache' => 'TeaAdmin\Controller\CacheController',
            'TeaAdmin\Controller\Config' => 'TeaAdmin\Controller\ConfigController',
        ),
    ),
    'view_manager' => array(
        'template_map' => array(
            // Layout
            'layout/admin_layout'            => __DIR__ . '/../view/layout/layout.phtml',
            
            // Partial
            'tea-admin/menu'                 => __DIR__ . '/../view/partial/menu.phtml',
            'tea-admin/breadcrumbs'          => __DIR__ . '/../view/partial/breadcrumbs.phtml',
            
            // Form
            'tea-admin/form/row'             => __DIR__ . '/../view/partial/form/row.phtml'
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
);