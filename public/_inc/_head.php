<?php
global $title, $menu;

$title = isset($title) ? $title : '';
$menu = isset($menu) ? $menu : 'dashboard';
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
    <title><?php echo !empty($title) ? $title . ' | ' : '' ?>Teapress Academy</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/foundation.css" />
    <link rel="stylesheet" href="css/teapress.css" />
    <script src="js/modernizr.js"></script>
</head>
<body class="antialiased">
    <div class="fixed">
        <nav class="top-bar" data-topbar>
            <ul class="nav-name large-2 columns">
                <li class="name">
                    <h1><a href="#">Teapress Academy</a></h1>
                </li>
            </ul>

            <section class="top-bar-section">
                <ul class="right">
                    <li class="has-dropdown">
                        <a href="#">
                            <img src="http://placehold.it/20x20/ffffff/777777&text=A" alt="" />
                            Achraf Ach Chouk
                        </a>
                        <ul class="dropdown">
                            <li><a href="#">My profile</a></li>
                            <li><a href="#">My settings</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Logout</a></li>
                        </ul>
                    </li>
                </ul>

                <ul class="left">
                    <li><a href="#">Go to website</a></li>
                </ul>
            </section>
        </nav>
    </div>

    <div class="row collapse">
        <div class="menu-content hide-for-small large-2 columns">
            <ul class="side-nav">
                <li<?php echo 'dashboard' == $menu ? ' class="active"' : '' ?>><a href="dashboard.php">Dashboard</a></li>
                <li class="subheader">Your contents</li>
                <li<?php echo in_array($menu, array('list-posts', 'add-post', 'edit-post')) ? ' class="active"' : '' ?>><a href="list-posts.php">Posts</a></li>
                <li<?php echo in_array($menu, array('list-pages', 'add-page', 'edit-page')) ? ' class="active"' : '' ?>><a href="list-pages.php">Pages</a></li>
                <li<?php echo 'list-medias' == $menu ? ' class="active"' : '' ?>><a href="list-medias.php">Medias</a></li>
                <li<?php echo 'add-media' == $menu ? ' class="active"' : '' ?>><a href="add-media.php">Add media</a></li>
                <li<?php echo 'list-categories' == $menu ? ' class="active"' : '' ?>><a href="list-categories.php">Categories</a></li>
                <li<?php echo 'add-category' == $menu ? ' class="active"' : '' ?>><a href="add-category.php">Add category</a></li>
                <li class="subheader">Your members</li>
                <li><a href="#">Roles</a></li>
                <li><a href="#">Members</a></li>
                <li><a href="#">Comments</a></li>
                <li class="subheader">Your website</li>
                <li><a href="#">Navigation</a></li>
                <li><a href="#">Plugins</a></li>
                <li><a href="#">Widgets</a></li>
                <li class="subheader">Configurations</li>
                <li><a href="#">General</a></li>
                <li><a href="#">Themes</a></li>
                <li><a href="#">Notifications</a></li>
                <li><a href="#">Social networks</a></li>
                <li><a href="#">Import / Export</a></li>
                <li><a href="#">Cache</a></li>
            </ul>
        </div>

        <div class="main-content large-10 columns">
