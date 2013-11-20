<?php

return array(
    'router' => array(
        'routes' => array(
            'admin' => array(
                'child_routes' => array(
                    'module' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => '/module',
                            'defaults' => array(
                                'controller' => 'TeaModule\Controller\Index',
                                'action' => 'index',
                            ),
                        ),
                        'may_terminate' => true,
                        'child_routes' => array(
                            'install' => array(
                                'type' => 'Literal',
                                'options' => array(
                                    'route' => '/install',
                                    'defaults' => array(
                                        'action' => 'install',
                                    ),
                                ),
                                'may_terminate' => true,
                                'child_routes' => array(
                                    'progress' => array(
                                        'type' => 'Literal',
                                        'options' => array(
                                            'route' => '/progress',
                                            'defaults' => array(
                                                'action' => 'progress',
                                            )
                                        )
                                    )
                                )
                            ),
                            'create' => array(
                                'type' => 'Literal',
                                'options' => array(
                                    'route' => '/create',
                                    'defaults' => array(
                                        'action' => 'create',
                                    ),
                                ),
                            ),
                        ),
                    ),
                ),
            ),
        ),
    ),
);