<?php
$title = 'Posts';
$menu = 'list-posts';
include('_inc/_head.php');
?>
<ul class="breadcrumbs">
    <li><a href="dashboard.php">Homepage</a></li>
    <li class="current"><a href="list-posts.php">Posts</a></li>
    <li class="right"><a href="add-post.php">Add blog post</a></li>
</ul>

<form class="filter-page row collapse">
    <div class="large-2 columns">
        <span class="prefix">Search in all your blog posts</span>
    </div>
    <div class="large-10 columns">
        <input type="search" name="term" placeholder="Type the name of a blog post" tabindex="1" />
    </div>
</form>

<?php if (isset($_GET['save'])): ?>
    <div data-alert class="alert-box success">
        Your blog post "New post title" has been saved. <a href="#">Click here</a> to see it in your website.
        <a href="#" class="close">&times;</a>
    </div>
<?php elseif (isset($_GET['del'])): ?>
    <div data-alert class="alert-box alert">
        Your blog post "Post title" has been deleted.
        <a href="#" class="close">&times;</a>
    </div>
<?php endif ?>

<table class="listing" width="100%">
    <thead>
        <tr>
            <th width="10"><input type="checkbox" /></th>
            <th>Title</th>
            <th width="150">Author</th>
            <th width="150">Publish date</th>
        </tr>
    </thead>
    <tbody>
        <?php for ($i = 0; $i < 10; $i++): ?>
            <tr>
                <th><input type="checkbox" /></th>
                <td>
                    <a href="edit-post.php">Post title</a>, posted in <a href="#" class="category">Category</a>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla volutpat nisl augue, sed varius justo fringilla a...</p>
                </td>
                <td>Christophe M.</td>
                <td>Nov 30 2013</td>
            </tr>
        <?php endfor ?>
    </tbody>
</table>

<div class="pagination-centered">
    <ul class="pagination">
        <li class="arrow unavailable"><a href="">&laquo;</a></li>
        <li><a href="">1</a></li>
        <li><a href="">2</a></li>
        <li class="current"><a href="">3</a></li>
        <li><a href="">4</a></li>
        <li class="unavailable"><a href="">&hellip;</a></li>
        <li><a href="">12</a></li>
        <li><a href="">13</a></li>
        <li class="arrow"><a href="">&raquo;</a></li>
    </ul>
</div>
<?php include('_inc/_foot.php') ?>