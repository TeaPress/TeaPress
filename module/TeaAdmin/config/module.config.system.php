<?php
return array(
    'system' => array(
        'tabs' => array(
            'general' => array(
                'label' => 'General',
                'order' => 10,
                'sections' => array(
                    'web' => array(
                        'label' => 'Web',
                        'order' => 10,
                        'groups' => array(
                            'web_unsecure' => array(
                                'label' => 'Url Web Unsecure',
                                'order' => 10,
                                'fields' => array(
                                    'label' => 'base_url',
                                    'type' => 'text',
                                    'comment' => '',
                                    'order' => 10,
                                )
                            )
                        )
                    )
                )
            )
        ),
        'adapter' => 'DbTable'
    )
);