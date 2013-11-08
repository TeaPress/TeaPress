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
                        'pages' => array(
                            'new' => array(
                                'label' => 'New Category',
                                'route' => 'admin/blog/category/new',
                                'resource' => 'admin/blog/category/new',
                                'visible' => false,
                            ),
                            'edit' => array(
                                'label' => 'Edit Category',
                                'route' => 'admin/blog/category/edit',
                                'resource' => 'admin/blog/category/edit',
                                'visible' => false,
                            )
                        )
                    ),
                    'post' => array(
                        'label' => 'Posts',
                        'route' => 'admin/blog/post',
                        'resource' => 'admin/blog/post',
                        'order' => 200,
                        'pages' => array(
                            'new' => array(
                                'label' => 'New Post',
                                'route' => 'admin/blog/post/new',
                                'resource' => 'admin/blog/post/new',
                                'visible' => false,
                            ),
                            'edit' => array(
                                'label' => 'Edit Post',
                                'route' => 'admin/blog/post/edit',
                                'resource' => 'admin/blog/post/edit',
                                'visible' => false,
                            )
                        )
                    )
                )
            )
        )
    ),
);