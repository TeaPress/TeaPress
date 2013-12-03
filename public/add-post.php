<?php
$title = 'Add post';
$menu = 'add-post';
include('_inc/_head.php');
?>
<ul class="breadcrumbs">
    <li><a href="dashboard.php">Homepage</a></li>
    <li><a href="list-posts.php">Posts</a></li>
    <li class="current"><a href="add-post.php">Add post</a></li>
</ul>

<h2><?php echo $title ?></h2>

<form action="list-posts.php" enctype="multipart/form-data">
    <fieldset>
        <div class="large-3 columns">
            <h3>Write your blog post</h3>
            <div class="info">
                <p>Give your blog post a title and add your content. Don't forget to make your title uniq.</p>
                <p><a href="#">View in your website.</a></p>
            </div>
        </div>
        <div class="large-9 columns">
            <div class="row">
                <label for="post-0">Slug <small>***</small> <span class="note">Only Chris can understand this!</span></label>
                <input type="text" id="post-0" placeholder="" />
                <small class="error">It seems there is a beautiful error here</small>
            </div>
            <div class="row error">
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
                <label for="post-3">Excerpt</label>
                <textarea id="post-3" placeholder="Excerpt"></textarea>
                <p class="note">Excerpts are optional hand-crafted summaries of your content that can be used in your theme.</p>
            </div>
            <div class="row">
                <label>Thumbnail</label>
                <div class="panel callout large-3 columns">
                    <p class="text-center">Drag &amp; drop your thumbnail</p>
                    <a href="#" class="small button">Or use the Media library</a>
                </div>
                <div class="large-9 columns">
                    <p>Drag &amp; drop quickly your thumbnail in the gray box. Your image will be uploaded and you can edit its contents in the <a href="#">Media library</a>.</p>
                    <p>Or you can simply use the traditional way to upload image:</p>
                    <input type="file" />
                </div>
            </div>
        </div>
    </fieldset>

    <fieldset>
        <div class="large-3 columns">
            <h3>Organize your contents</h3>
            <div class="info">
                <p>Categorize your blog post to organize it &amp; set tags to permit cross-linking.</p>
            </div>
        </div>
        <div class="large-9 columns">
            <div class="row">
                <label>Category</label>
                <select>
                    <option value="husker">Husker</option>
                    <option value="starbuck">Starbuck</option>
                    <option value="hotdog">Hot Dog</option>
                    <option value="apollo">Apollo</option>
                </select>
            </div>
            <div class="row">
                <label>Tags <span class="note">Separate each tag with comma.</span></label>
                <input type="text" placeholder="tea drink coffee" />
            </div>
        </div>
    </fieldset>

    <fieldset>
        <div class="large-3 columns">
            <h3>Find them efficiently</h3>
            <div class="info">
                <p>Set up the page title and meta description. These help you to define how this blog post shows up on search engines.</p>
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
                <p>Control if this blog post can be viewed on your website and when it can be viewed.</p>
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
                <p>Aprouve comments and define how to publish your contents in all your social networks.</p>
            </div>
        </div>
        <div class="large-9 columns">
            <div class="row">
                <label>Comments</label>
                <label class="choice" for="com-1"><input name="com-radio" type="radio" id="com-1" required=""> Comments are disabled</label>
                <label class="choice" for="com-2"><input name="com-radio" type="radio" id="com-2" required=""> Comments are allowed, pending moderation</label>
                <label class="choice" for="com-3"><input name="com-radio" type="radio" id="com-2" required=""> Comments are allowed, and are automatically published</label>
            </div>
            <div class="row">
                <label class="text-facebook">Publish on your facebook page</label>
                <div class="row">
                    <label class="choice" for="pub-fb-1"><input name="pub-fb-radio" type="radio" id="pub-fb-1" required=""> Yes</label>
                    <label class="choice" for="pub-fb-2"><input name="pub-fb-radio" type="radio" id="pub-fb-2" required=""> No</label>
                </div>
                <div class="row">
                    <input type="text" placeholder="Facebook title" />
                    <textarea id="post-3" placeholder="Facebook description"></textarea>
                </div>
                <div class="row">
                    <label class="text-twitter">Publish on your twitter profile</label>
                </div>
                <div class="row">
                    <a href="#" class="action">Connect your website to your twitter profile.</a>
                </div>
            </div>
            <div class="row">
                <label class="text-googleplus">Publish on your google+ page</label>
                <a href="#" class="action">Connect your website to your google+ page.</a>
            </div>
        </div>
    </fieldset>

    <div class="buttonized button-bar">
        <ul class="button-group right">
            <li><a href="list-posts.php" class="tiny button none">Cancel</a></li>
            <li><button type="submit" name="save" class="tiny button">Save blog post</button></li>
        </ul>
    </div>
</form>
<?php include('_inc/_foot.php') ?>