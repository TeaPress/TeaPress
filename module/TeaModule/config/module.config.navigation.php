<?php
return array(
    'navigation' => array(
        'tea-admin' => array(
            'system' => array(
                'pages' => array(
                    'module' => array(
                        'label' => 'Extensions',
                        'route' => 'admin/module',
                        'resource' => 'admin/module',
                        'order' => 500,
                        'pages' => array(
                            'create' => array(
                                'label' => 'Create extension',
                                'route' => 'admin/module/create',
                                'resource' => 'admin/module/create',
                                'visible' => false
                            ),
                            'install' => array(
                                'label' => 'Install extension',
                                'route' => 'admin/module/install',
                                'resource' => 'admin/module/install',
                                'visible' => false
                            ),
                        )
                    )
                )
            )
        )
    )
);