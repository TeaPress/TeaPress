<?php
return array(
    'controllers' => array(
        'invokables' => array(
            'TeaModule\Controller\Index' => 'TeaModule\Controller\IndexController',
        )
    ),
    'form_elements' => array(
        'invokables' => array(
            'TeaModule\Form\Install' => 'TeaModule\Form\Install',
        )
    ),
    'view_manager' => array(
        'template_map' => array(
        ),
        'template_path_stack' => array(
            __DIR__ . '/../view',
        ),
        'strategies' => array(
            'ViewJsonStrategy',
        ),
    )
);