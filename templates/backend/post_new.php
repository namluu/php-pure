<?php $title = 'Post new' ?>
<?php ob_start() ?>
<h2><?= $title ?></h2>

<p><a href="/backend/post">Back</a></p>
<form method="post" action="/backend/post/new">
    Title:<br /><input type="text" name="title" /><br />
    Content:<br /><textarea name="content"></textarea><br />
    Category: <br />
        <select name="category_id">
            <?php foreach($categories as $category): ?>
            <option value="<?= $category->id ?>"><?= $category->title ?></option>
            <?php endforeach; ?>
        </select>
    <br />
    <input type="submit" value="Submit" />
</form>

<?php $content = ob_get_clean() ?>

<?php include 'layout.php' ?>
