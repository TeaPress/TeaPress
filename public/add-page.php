<?php
$title = 'Add page';
$menu = 'add-page';
include('_inc/_head.php');
?>
<ul class="breadcrumbs">
    <li><a href="dashboard.php">Homepage</a></li>
    <li><a href="list-pages.php">Pages</a></li>
    <li class="current"><a href="add-page.php">Add page</a></li>
</ul>

<h2><?php echo $title ?></h2>

<form action="list-pages.php" enctype="multipart/form-data">
    <fieldset>
        <div class="large-3 columns">
            <h3>Write your page</h3>
            <div class="info">
                <p>Give your page a title and add your content. Don't forget to make your title uniq.</p>
                <p><a href="#">View in your website.</a></p>
            </div>
        </div>
        <div class="large-9 columns">
            <div class="row">
                <label for="post-0">Slug <small>***</small></label>
                <input type="text" id="post-0" placeholder="" />
                <small class="error">It seems there is a beautiful error here</small>
            </div>
            <div class="row">
                <label for="post-1">Title</label>
                <input type="text" id="post-1" placeholder="Put your title here, make it uniq!" />
                <small class="error">It seems there is a beautiful error here</small>
            </div>
            <div class="row">
                <label for="post-2">Contents <span class="note">Use <kbd>ALT</kbd> or <kbd>CMD</kbd> keyboard to reveal accesskeys.</span></label>
                <textarea id="post-2" class="redactor" placeholder="Contents"></textarea>
                <small class="error">It seems there is a beautiful error here</small>
                <p class="note">To make better search engine optimizations, write between 300 and 800 words and repeat to 8 times your main tags.</p>
            </div>
            <div class="row">
                <label>Tags <span class="note">Separate each tag with comma.</span></label>
                <input type="text" placeholder="tea drink coffee" />
            </div>
        </div>
    </fieldset>

    <fieldset>
        <div class="large-3 columns">
            <h3>Find it efficiently</h3>
            <div class="info">
                <p>Set up the page title and meta description. These help you to define how this page shows up on search engines.</p>
            </div>
        </div>
        <div class="large-9 columns">
            <div class="row">
                <label>Page title <span class="note">Write to 70 characters (<b>0</b> used).</span></label>
                <input type="text" placeholder="" />
            </div>
            <div class="row">
                <label>Meta description <span class="note">Write to 160 characters (<b>0</b> used).</span></label>
                <input type="text" placeholder="" />
            </div>
        </div>
    </fieldset>

    <fieldset>
        <div class="large-3 columns">
            <h3>Publish in the rigth way</h3>
            <div class="info">
                <p>Control if this page can be viewed on your website and when it can be viewed.</p>
            </div>
        </div>
        <div class="large-9 columns">
            <div class="row">
                <label>Visibility</label>
                <label class="choice" for="radio1"><input name="radioButtons" type="radio" id="radio1" required=""> Visibible <span class="note">as of 2013-11-24, 13:23pm</span></label>
                <label class="choice" for="radio2"><input name="radioButtons" type="radio" id="radio2" required=""> Hidden</label>
            </div>
            <div class="row">
                <a href="#" class="action">Set a specific publish date ...</a>
            </div>
            <div class="row">
                <label>Author</label>
                <select>
                    <option value="1">Chris</option>
                    <option value="2">Ach</option>
                </select>
            </div>
        </div>
    </fieldset>

    <fieldset>
        <div class="large-3 columns">
            <h3>Socialize it</h3>
            <div class="info">
                <p>Define how to publish your contents in all your social networks.</p>
            </div>
        </div>
        <div class="large-9 columns">
            <div class="row">
                <label class="text-facebook">Publish on your facebook page</label>
                <label class="choice" for="pub-fb-1"><input name="pub-fb-radio" type="radio" id="pub-fb-1" required=""> Yes</label>
                <label class="choice" for="pub-fb-2"><input name="pub-fb-radio" type="radio" id="pub-fb-2" required=""> No</label>
            </div>
            <div class="row">
                <label class="text-instagram">Publish on your instagram profile</label>
                <a href="#" class="action">Connect your website to your instagram profile.</a>
            </div>
            <div class="row">
                <label class="text-googleplus">Publish on your google+ page</label>
                <a href="#" class="action">Connect your website to your google+ page.</a>
            </div>
        </div>
    </fieldset>

    <div class="buttonized button-bar">
        <ul class="button-group right">
            <li><a href="list-pages.php" class="tiny button none">Cancel</a></li>
            <li><button type="submit" name="save" class="tiny button">Save page</button></li>
        </ul>
    </div>
</form>
<?php include('_inc/_foot.php') ?>