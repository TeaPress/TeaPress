<?php
return array(
    'tea-admin-acl' => array(
        'admin' => array(
            'title' => 'Admininistration',
            'resource' => 'admin',
            'children' => array(
                'user' => array(
                    'title' => 'List user',
                    'group' => 'User',
                    'resource' => 'admin/user',
                    'children' => array(
                        'new' => array(
                            'title' => 'Create user',
                            'resource' => 'admin/user/new'
                        ),
                        'edit' => array(
                            'title' => 'Edit user',
                            'resource' => 'admin/user/edit'
                        )
                    )
                ),
                'role' => array(
                    'title' => 'List role',
                    'group' => 'Role',
                    'resource' => 'admin/role',
                    'children' => array(
                        'new' => array(
                            'title' => 'Create role',
                            'resource' => 'admin/role/new'
                        ),
                        'edit' => array(
                            'title' => 'Edit role',
                            'resource' => 'admin/role/edit'
                        )
                    )
                ),
                'cache' => array(
                    'title' => 'List cache',
                    'group' => 'Cache',
                    'resource' => 'admin/cache',
                    'children' => array(
                        'flush' => array(
                            'title' => 'Flush cache',
                            'resource' => 'admin/cache/flush'
                        )
                    )
                ),
                'config' => array(
                    'title' => 'Configuration',
                    'resource' => 'admin/config',
                )
            )
        )
    )
);