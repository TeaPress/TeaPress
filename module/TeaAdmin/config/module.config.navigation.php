<?php
return array(
    'navigation' => array(
        'tea-admin' => array(
            'dashboard' => array(
                'label' => 'Dashboard',
                'route' => 'admin',
                'order' => 100,
                'pages' => array(
                    
                )
            ),
            'system' => array(
                'label' => 'System',
                'uri' => '#',
                'order' => 900,
                'pages' => array(
                    'user' => array(
                        'label' => 'Users',
                        'route' => 'admin/user',
                        'order' => 100
                    ),
                    'role' => array(
                        'label' => 'Roles',
                        'route' => 'admin/role',
                        'order' => 200
                    )
                )
            )
        )
    )
);