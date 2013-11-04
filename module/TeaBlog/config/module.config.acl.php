<?php
return array(
    'tea-admin-acl' => array(
        'admin' => array(
            'children' => array(
                'blog' => array(
                    'title' => 'Blog',
                    'resource' => 'admin/blog',
                    'children' => array(
                        'category' => array(
                            'title' => 'Category',
                            'resource' => 'admin/blog/category',
                        )
                    )
                )
            )
        )
    )
);