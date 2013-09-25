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
            ),
        ),
    ),
);