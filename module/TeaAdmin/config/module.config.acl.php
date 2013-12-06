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
                    'children' => array(
                        'new' => array(
                            'title' => 'Create user',
                            'resource' => 'admin/user/new'
                        ),
                        'edit' => array(
                            'title' => 'Edit user',
                            'resource' => 'admin/user/edit'
                        ),
                    	'delete' => array(
                    		'title' => 'Delete user',
                    		'resource' => 'admin/user/delete'
                    	)
                    )
                ),
                'role' => array(
                    'title' => 'Role',
                    'resource' => 'admin/role',
                    'children' => array(
                        'new' => array(
                            'title' => 'Create role',
                            'resource' => 'admin/role/new'
                        ),
                        'edit' => array(
                            'title' => 'Edit role',
                            'resource' => 'admin/role/edit'
                        ),
                    	'delete' => array(
                    		'title' => 'Delete user',
                    		'resource' => 'admin/role/delete'
                    	)
                    )
                ),
                'cache' => array(
                    'title' => 'Cache',
                    'resource' => 'admin/cache',
                    'children' => array(
                        'flush' => array(
                            'title' => 'Flush cache',
                            'resource' => 'admin/cache/flush'
                        ),
                        'flushAll' => array(
                            'title' => 'Flush all cache',
                            'resource' => 'admin/cache/flushAll'
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