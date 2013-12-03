<?php
$title = 'Roles';
$menu = 'list-roles';
include('_inc/_head.php');
?>
<ul class="breadcrumbs">
    <li><a href="dashboard.php">Homepage</a></li>
    <li class="current"><a href="list-roles.php">Roles</a></li>
    <li class="right"><a href="add-role.php">Add role</a></li>
</ul>

<form class="filter-page row collapse">
    <div class="large-2 columns">
        <span class="prefix">Search in all your roles</span>
    </div>
    <div class="large-10 columns">
        <input type="search" name="term" placeholder="Type the name of a role" tabindex="1" />
    </div>
</form>

<?php if (isset($_GET['save'])): ?>
    <div data-alert class="alert-box success">
        Your role "My new role" has been saved.
        <a href="#" class="close">&times;</a>
    </div>
<?php elseif (isset($_GET['del'])): ?>
    <div data-alert class="alert-box alert">
        Your role "My role" has been deleted.
        <a href="#" class="close">&times;</a>
    </div>
<?php endif ?>

<table class="listing" width="100%">
    <thead>
        <tr>
            <th width="10"><input type="checkbox" /></th>
            <th>Role</th>
        </tr>
    </thead>
    <tbody>
        <?php for ($i = 0; $i < 4; $i++): ?>
            <tr>
                <th><input type="checkbox" /></th>
                <td>
                    <a href="edit-role.php">Role title</a>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla volutpat nisl augue, sed varius justo fringilla a...</p>
                </td>
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