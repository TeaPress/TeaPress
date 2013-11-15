<?php
return array(
    'system' => array(
        'tabs' => array(
            'blog' => array(
                'label' => 'Blog',
                'order' => 10,
                'sections' => array(
                    'general' => array(
                        'label' => 'General',
                        'order' => 10,
                        'groups' => array(
                            'information' => array(
                                'label' => 'General Information',
                                'order' => 10,
                                'fields' => array(
                                    'name' => array(
                                        'label' => 'Website name',
                                        'type' => 'text',
                                        'order' => 10,
                                    )
                                )
                            )
                        )
                    )
                )
            )
        )
    )
);