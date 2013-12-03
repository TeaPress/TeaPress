<?php
$title = 'My role';
$menu = 'edit-role';
include('_inc/_head.php');
?>
<ul class="breadcrumbs">
    <li><a href="dashboard.php">Homepage</a></li>
    <li><a href="list-roles.php">Roles</a></li>
    <li class="current"><a href="edit-role.php">Edit role "My role"</a></li>
</ul>

<h2><?php echo $title ?></h2>

<form action="list-roles.php">
    <fieldset>
        <div class="large-3 columns">
            <h3>Define your role</h3>
            <div class="info">
                <p>Give your role a title and a content. This will help you to organize your team efficiently.</p>
            </div>
        </div>
        <div class="large-9 columns">
            <div class="row">
                <label for="post-1">Title</label>
                <input type="text" id="post-1" placeholder="Put your title here, make it uniq!" value="My role" />
            </div>
            <div class="row">
                <label for="post-2">Contents</label>
                <textarea id="post-2" class="redactor" placeholder="Contents"></textarea>
            </div>
        </div>
    </fieldset>

    <fieldset>
        <div class="large-3 columns">
            <h3>Define your permissions</h3>
            <div class="info">
                <p>Set up the role permissions and allow or disallow your team to access and use your mods.</p>
            </div>
        </div>
        <div class="large-9 columns">
            <table class="listing permissions" width="100%">
                <thead class="contain-to-grid sticky">
                    <tr>
                        <th>Module</th>
                        <th width="150">Allow</th>
                    </tr>
                </thead>
                <tbody>
                    <?php for ($i = 0; $i < 4; $i++): ?>
                        <tr>
                            <th colspan="2">TeaBlog</th>
                        </tr>
                        <tr>
                            <td>
                                <label for="perm-1-<?php echo $i ?>">
                                    List contents
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla volutpat nisl augue, sed varius justo fringilla a...</p>
                                </label>
                            </td>
                            <td><input type="checkbox" id="perm-1-<?php echo $i ?>" /></td>
                        </tr>
                        <tr>
                            <td>
                                <label for="perm-2-<?php echo $i ?>">
                                    Create content
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla volutpat nisl augue, sed varius justo fringilla a...</p>
                                </label>
                            </td>
                            <td><input type="checkbox" id="perm-2-<?php echo $i ?>" /></td>
                        </tr>
                        <tr>
                            <td><label for="perm-3-<?php echo $i ?>">Edit content</label></td>
                            <td><input type="checkbox" id="perm-3-<?php echo $i ?>" /></td>
                        </tr>
                        <tr>
                            <td>
                                <label for="perm-4-<?php echo $i ?>">
                                    Publish content
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla volutpat nisl augue, sed varius justo fringilla a...</p>
                                </label>
                            </td>
                            <td><input type="checkbox" id="perm-4-<?php echo $i ?>" /></td>
                        </tr>
                        <tr>
                            <td><label for="perm-5-<?php echo $i ?>">Delete content</label></td>
                            <td><input type="checkbox" id="perm-5-<?php echo $i ?>" /></td>
                        </tr>
                        <tr>
                            <td><label for="perm-6-<?php echo $i ?>">Import/Export contents</label></td>
                            <td><input type="checkbox" id="perm-6-<?php echo $i ?>" /></td>
                        </tr>
                    <?php endfor ?>
                </tbody>
            </table>
        </div>
    </fieldset>

    <div class="buttonized button-bar">
        <ul class="button-group right">
            <li><a href="list-roles.php" class="tiny button none">Cancel</a></li>
            <li><button type="submit" name="save" class="tiny button">Save role</button></li>
        </ul>
        <ul class="button-group left">
            <li><a href="list-roles.php?del=" class="tiny button alert">Delete role</a></li>
        </ul>
    </div>
</form>
<?php include('_inc/_foot.php') ?>