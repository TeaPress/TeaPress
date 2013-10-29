<?php

return array(
    'router' => array(
        'routes' => array(
            'admin' => array(
                'child_routes' => array(
                    'config' => array(
                        'type' => 'Literal',
                        'options' => array(
                            'route' => '/config',
                            'defaults' => array(
                                'controller' => 'TeaCore\Controller\Config',
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