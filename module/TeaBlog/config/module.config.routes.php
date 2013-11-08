<?php

return array(
    'router' => array(
        'routes' => array(
            // Front routes
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
            // Admin routes
            'admin' => array(
                'child_routes' => array(
                    'blog' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => '/blog',
                            'defaults' => array(
                                'controller' => 'TeaBlogAdmin\Controller\Index',
                                'action' => 'index',
                            ),
                        ),
                        'may_terminate' => true,
                        'child_routes' => array(
                            'category' => array(
                                'type' => 'Literal',
                                'options' => array(
                                    'route' => '/category',
                                    'defaults' => array(
                                        'controller' => 'TeaBlogAdmin\Controller\Category',
                                        'action' => 'index',
                                    )
                                ),
                                'may_terminate' => true,
                                'child_routes' => array(
                                    'new' => array(
                                        'type' => 'Literal',
                                        'options' => array(
                                            'route' => '/new',
                                            'defaults' => array(
                                                'action' => 'new',
                                            )
                                        )
                                    ),
                                    'edit' => array(
                                        'type' => 'Regex',
                                        'options' => array(
                                            'regex' => '/edit/(?P<id>\d+)',
                                            'spec' => '/edit/%id%',
                                            'defaults' => array(
                                                'action' => 'edit',
                                            )
                                        )
                                    )
                                )
                            ),
                            'post' => array(
                                'type' => 'Literal',
                                'options' => array(
                                    'route' => '/post',
                                    'defaults' => array(
                                        'controller' => 'TeaBlogAdmin\Controller\Post',
                                        'action' => 'index',
                                    )
                                ),
                                'may_terminate' => true,
                                'child_routes' => array(
                                    'new' => array(
                                        'type' => 'Literal',
                                        'options' => array(
                                            'route' => '/new',
                                            'defaults' => array(
                                                'action' => 'new',
                                            )
                                        )
                                    ),
                                    'edit' => array(
                                        'type' => 'Regex',
                                        'options' => array(
                                            'regex' => '/edit/(?P<id>\d+)',
                                            'spec' => '/edit/%id%',
                                            'defaults' => array(
                                                'action' => 'edit',
                                            )
                                        )
                                    )
                                )
                            )
                        )
                    )
                )
            )
        )
    )
);