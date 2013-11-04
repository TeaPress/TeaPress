<?php
return array(
    'navigation' => array(
        'default' => array(
            'home' => array(
                'label' => 'Home',
                'route' => 'home',
                'pages' => array(
                    
                ),
            ),
        ),
        'tea-admin' => array(
            'blog' => array(
                'label' => 'Blog',
                'route' => 'admin/blog',
                'resource' => 'admin/blog',
                'order' => 200,
                'pages' => array(
                    'category' => array(
                        'label' => 'Categorys',
                        'route' => 'admin/blog/category',
                        'resource' => 'admin/blog/category',
                        'order' => 100,
                    ),
                    'post' => array(
                        'label' => 'Posts',
                        'route' => 'admin/blog/post',
                        'resource' => 'admin/blog/post',
                        'order' => 100,
                    ),
                )
            )
        )
    ),
);