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
                            'children' => array(
                                'new' => array(
                                    'title' => 'New Category',
                                    'resource' => 'admin/blog/category/new',
                                ),
                                'edit' => array(
                                    'title' => 'Edit Category',
                                    'resource' => 'admin/blog/category/edit',
                                )
                            )
                        ),
                        'post' => array(
                            'title' => 'Post',
                            'resource' => 'admin/blog/post',
                            'children' => array(
                                'new' => array(
                                    'title' => 'New Category',
                                    'resource' => 'admin/blog/post/new',
                                ),
                                'edit' => array(
                                    'title' => 'Edit Category',
                                    'resource' => 'admin/blog/post/edit',
                                )
                            )
                        )
                    )
                )
            )
        )
    )
);