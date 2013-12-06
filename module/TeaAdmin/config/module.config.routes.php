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
                        	'delete' => array(
                        		'type' => 'Regex',
                        		'options' => array(
                        			'regex' => '/delete/(?P<id>\d+)',
                        			'spec' => '/delete/%id%',
                        				'defaults' => array(
                        				'action' => 'delete',
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
                        	'delete' => array(
                        		'type' => 'Regex',
                        		'options' => array(
                        			'regex' => '/delete/(?P<id>\d+)',
                        			'spec' => '/delete/%id%',
                        			'defaults' => array(
                        				'action' => 'delete',
                        			),
                        		),
                        	),
                        ),
                    ),
                    'cache' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => '/cache',
                            'defaults' => array(
                                'controller' => 'TeaAdmin\Controller\Cache',
                                'action' => 'index',
                            ),
                        ),
                        'may_terminate' => true,
                        'child_routes' => array(
                            'flush' => array(
                                'type' => 'Regex',
                                'options' => array(
                                    'regex' => '/flush/(?<key>[a-zA-Z0-9-_\.]+)',
                                    'defaults' => array(
                                        'action' => 'flush',
                                    ),
                                    'spec' => '/flush/%key%',
                                ),
                            ),
                            'flushAll' => array(
                                'type' => 'Literal',
                                'options' => array(
                                    'route' => '/flushAll',
                                    'defaults' => array(
                                        'action' => 'flushAll',
                                    ),
                                ),
                            ),
                        ),
                    ),
                    'config' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => '/config',
                            'defaults' => array(
                                'controller' => 'TeaAdmin\Controller\Config',
                                'action' => 'index',
                            ),
                        ),
                        'may_terminate' => true,
                        'child_routes' => array(
                            'edit' => array(
                                'type' => 'Regex',
                                'options' => array(
                                    'regex' => '/edit/section/(?<section>[a-zA-Z0-9-_\.]+)',
                                    'defaults' => array(
                                        'action' => 'edit',
                                    ),
                                    'spec' => '/edit/section/%section%',
                                ),
                            )
                        )
                    ),
                ),
            ),
        ),
    ),
);