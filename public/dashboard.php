<?php
$title = 'Dashboard';
$menu = 'dashboard';
include('_inc/_head.php');
?>
<ul class="breadcrumbs">
    <li class="current"><a href="#">Homepage</a></li>
</ul>

<h2><?php echo $title ?></h2>

<div data-alert class="alert-box success">
    This is a success alert.
    <a href="#" class="close">&times;</a>
</div>

<div data-alert class="alert-box alert">
    This is an alert.
    <a href="#" class="close">&times;</a>
</div>

<div data-alert class="alert-box info">
    This is an info alert.
    <a href="#" class="close">&times;</a>
</div>

<div data-alert class="alert-box secondary">
    This is a normal alert.
    <a href="#" class="close">&times;</a>
</div>

<div class="dashboard">
    <div class="large-3 columns">
        /3/
    </div>
    <div class="large-9 columns">
        ///9///
    </div>
</div>
<?php include('_inc/_foot.php') ?>