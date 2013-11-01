<?php
return array(
    'service_manager' => array(
        'factories' => array(
            'TeaCore\System\Config' => 'TeaCore\System\ConfigFactory',
        ),
        'invokables' => array(
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
    'caches' => array(
        'TeaCacheConfig' => array(
            'adapter' => array(
                'name' => 'filesystem'
            ),
            'plugins' => array(
                'Serializer'
            ),
            'options' => array(
                'cache_dir' => 'data/cache/',
                'namespace' => 'tea_config',
                'writable' => true, // set one to false for desactivate cache.
                'readable' => true  // set one to false for desactivate cache.
            ),
        )
    ),
);