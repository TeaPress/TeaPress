<?php
return array(
    'system' => array(
        'tabs' => array(
            'general' => array(
                'sections' => array(
                    'design' => array(
                        'label' => 'Design',
                        'order' => 20,
                        'groups' => array(
                            'theme' => array(
                                'label' => 'Theme',
                                'order' => 10,
                                'fields' => array(
                                    'current' => array(
                                        'label' => 'Theme',
                                        'type' => 'Select',
                                        'options' => array(
                                            'service' => 'TeaTheme\Theme\Manager',
                                            'function' => 'getThemesForConfig'
                                        )
                                    )
                                )
                            )
                        )
                    )
                )
            )
        ),
        'values' => array(
            'design' => array(
                'theme' => array(
                    'current' => 'default'
                )
            )
        )
    )
);