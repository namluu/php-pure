<?php $title = 'Category new' ?>
<?php ob_start() ?>
<h2><?= $title ?></h2>

<p><a href="/backend/category">Back</a></p>
<form method="post" action="/backend/category/new">
    Title:<br /><input type="text" name="title" /><br />
    Content:<br /><textarea name="content"></textarea><br />
    <input type="submit" value="Submit" />
</form>

<?php $content = ob_get_clean() ?>

<?php include 'layout.php' ?>
