<?php
return array(
    'tea_theme' => array(
        'myTheme' => array(
            'label' => 'Mon Theme de test',
            'template_map' => array(
                'layout/layout'            => __DIR__ . '/../view/layout/layout_2col_right.phtml',
                'partial/paginator.phtml'  => __DIR__ . '/../view/partial/paginator.phtml',
            ),
            'template_path_stack' => array(
                __DIR__ . '/../view',
            ),
        )
    )
);