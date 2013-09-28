<?php

return array(
    'router' => array(
        'routes' => array(
            'admin' => array(
                'type' => 'Literal',
                'options' => array(
                    'route' => '/admin',
                    'defaults' => array(
                        'controller' => 'TeaAdmin\Controller\Index',
                        'action' => 'index',
                    ),
                ),
                'may_terminate' => true,
                'child_routes' => array(
                    'login' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => '/login',
                            'defaults' => array(
                                'controller' => 'TeaAdmin\Controller\Index',
                                'action' => 'login',
                            ),
                        ),
                    ),
                    'logout' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => '/logout',
                            'defaults' => array(
                                'controller' => 'TeaAdmin\Controller\Index',
                                'action' => 'logout',
                            ),
                        ),
                    ),
                    'user' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => '/user',
                            'defaults' => array(
                                'controller' => 'TeaAdmin\Controller\User',
                                'action' => 'index',
                            ),
                        ),
                        'may_terminate' => true,
                        'child_routes' => array(
                            'new' => array(
                                'type' => 'Literal',
                                'options' => array(
                                    'route' => '/new',
                                    'defaults' => array(
                                        'action' => 'new',
                                    ),
                                ),
                            ),
                            'edit' => array(
                                'type' => 'Regex',
                                'options' => array(
                                    'regex' => '/edit/(?P<id>\d+)',
                                    'spec' => '/edit/%id%',
                                    'defaults' => array(
                                        'action' => 'edit',
                                    ),
                                ),
                            ),
                        )
                    ),
                    'role' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => '/role',
                            'defaults' => array(
                                'controller' => 'TeaAdmin\Controller\Role',
                                'action' => 'index',
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
);