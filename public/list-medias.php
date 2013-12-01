<?php
$title = 'Medias';
$menu = 'list-medias';
include('_inc/_head.php');
?>
<ul class="breadcrumbs">
    <li><a href="dashboard.php">Homepage</a></li>
    <li class="current"><a href="list-medias.php">Medias</a></li>
    <li class="right"><a href="add-media.php">Add media</a></li>
</ul>

<form class="filter-page row collapse">
    <div class="large-2 columns">
        <span class="prefix">Search in all your medias</span>
    </div>
    <div class="large-10 columns">
        <input type="search" name="term" placeholder="Type the name of a media" tabindex="1" />
    </div>
</form>

<?php if (isset($_GET['save'])): ?>
    <div data-alert class="alert-box success">
        Your media "My new media" has been saved. <a href="#">Click here</a> to see it in your website.
        <a href="#" class="close">&times;</a>
    </div>
<?php elseif (isset($_GET['del'])): ?>
    <div data-alert class="alert-box alert">
        Your media "My media" has been deleted.
        <a href="#" class="close">&times;</a>
    </div>
<?php endif ?>

<div class="media-list row collapse">
    <?php for ($i = 0; $i < 10; $i++): ?>
        <div class="small-6 medium-4 large-2 columns">
            <a href="edit-media.php">
                <img src="http://www.placehold.it/150/150/000000/ffffff" alt="" />
                <span><b>Media title</b><br/>Nov 30 2013</span>
            </a>
        </div>
    <?php endfor ?>
    <div class="clearfix"></div>
</div>

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