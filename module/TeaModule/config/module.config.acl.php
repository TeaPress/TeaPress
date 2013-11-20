<?php
return array(
    'tea-admin-acl' => array(
        'admin' => array(
            'children' => array(
                'module' => array(
                    'title' => 'Extensions',
                    'resource' => 'admin/module',
                    'children' => array(
                        'create' => array(
                            'title' => 'Create Extension',
                            'resource' => 'admin/module/create',
                        ),
                        'install' => array(
                            'title' => 'Install Extension',
                            'resource' => 'admin/module/install',
                        ),
                    )
                )
            )
        )
    )
);