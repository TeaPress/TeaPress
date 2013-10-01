<?php
return array(
    'service_manager' => array(
        'invokables' => array(
            // services
            'TeaBlog\Service\Post' => 'TeaBlog\Service\Post',
            'TeaBlog\Service\Category' => 'TeaBlog\Service\Category',
        ),
    ),
    'translator' => array(
        'locale' => 'en_US',
        'translation_file_patterns' => array(
            array(
                'type'     => 'gettext',
                'base_dir' => __DIR__ . '/../language',
                'pattern'  => '%s.mo',
            ),
        ),
    ),
    'controllers' => array(
        'invokables' => array(
            'TeaBlog\Controller\Index' => 'TeaBlog\Controller\IndexController',
            'TeaBlog\Controller\Post' => 'TeaBlog\Controller\PostController',
        ),
    ),
    'view_manager' => array(
        'display_not_found_reason' => true,
        'display_exceptions'       => true,
        'doctype'                  => 'HTML5',
        'not_found_template'       => 'error/404',
        'exception_template'       => 'error/index',
        'template_map' => array(
            'layout/layout'            => __DIR__ . '/../view/layout/layout_2col_right.phtml',
            'layout/layout_1col'       => __DIR__ . '/../view/layout/layout_1col.phtml',
            'layout/layout_2col_right' => __DIR__ . '/../view/layout/layout_2col_right.phtml',
            'layout/layout_2col_left'  => __DIR__ . '/../view/layout/layout_2col_left.phtml',
            'partial/paginator.phtml'  => __DIR__ . '/../view/partial/paginator.phtml',
            'error/404'                => __DIR__ . '/../view/error/404.phtml',
            'error/index'              => __DIR__ . '/../view/error/index.phtml',
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
    ),
);