<?php

return array(
    'router' => array(
        'routes' => array(
            'blog' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/blog',
                    'defaults' => array(
                        'controller' => 'TeaBlog\Controller\Index',
                        'action' => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'post' => array(
                        'type' => 'Regex',
                        'options' => array(
                            'regex' => '/post/(?<name>[a-zA-Z0-9-_\.]+)',
                            'defaults' => array(
                                'controller' => 'TeaBlog\Controller\Post',
                                'action' => 'single',
                            ),
                            'spec' => '/post/%name%',
                        ),
                    ),
                    'category' => array(
                        'type' => 'Regex',
                        'options' => array(
                            'regex' => '/category/(?<name>[a-zA-Z0-9-_\.]+)',
                            'defaults' => array(
                                'controller' => 'TeaBlog\Controller\Post',
                                'action' => 'category',
                            ),
                            'spec' => '/category/%name%',
                        ),
                    ),
                ),
            ),
        ),
    ),
);