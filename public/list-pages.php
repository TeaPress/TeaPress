<?php
$title = 'Pages';
$menu = 'list-pages';
include('_inc/_head.php');
?>
<ul class="breadcrumbs">
    <li><a href="dashboard.php">Homepage</a></li>
    <li class="current"><a href="list-pages.php">Pages</a></li>
    <li class="right"><a href="add-page.php">Add page</a></li>
</ul>

<form class="filter-page row collapse">
    <div class="large-2 columns">
        <span class="prefix">Search in all your pages</span>
    </div>
    <div class="large-10 columns">
        <input type="search" name="term" placeholder="Type the name of a page" tabindex="1" />
    </div>
</form>

<?php if (isset($_GET['save'])): ?>
    <div data-alert class="alert-box success">
        Your page "My new title page" has been saved. <a href="#">Click here</a> to see it in your website.
        <a href="#" class="close">&times;</a>
    </div>
<?php elseif (isset($_GET['del'])): ?>
    <div data-alert class="alert-box alert">
        Your page "My title page" has been deleted.
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
                    <a href="edit-page.php">Page title</a>
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