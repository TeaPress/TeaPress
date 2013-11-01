<?php
return array(
    'tea-admin-acl' => array(
        'admin' => array(
            'title' => 'Admininistration',
            'resource' => 'admin',
            'children' => array(
                'user' => array(
                    'title' => 'User',
                    'resource' => 'admin/user',
                ),
                'role' => array(
                    'title' => 'Role',
                    'resource' => 'admin/role',
                ),
                'cache' => array(
                    'title' => 'Cache',
                    'resource' => 'admin/cache',
                ),
                'config' => array(
                    'title' => 'Configuration',
                    'resource' => 'admin/config',
                )
            )
        )
    )
);