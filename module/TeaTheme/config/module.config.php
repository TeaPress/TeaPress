<?php
return array(
    'service_manager' => array(
        'factories' => array(
            'TeaTheme\Theme\Manager' => 'TeaTheme\Theme\Factory',
        )
    ),
    'tea_theme' => array(
        'default' => array(
            'label' => 'Default theme'
        )
    )
);