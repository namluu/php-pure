<?php $title = 'Category edit' ?>
<?php ob_start() ?>
<h2><?= $title ?></h2>

<p><a href="/backend/category">Back</a></p>
<form method="post" action="/backend/category/edit/<?= $category->id ?>">
    Title:<br /><input type="text" name="title" value="<?= $category->title ?>" /><br />
    Content:<br /><textarea name="content"><?= $category->content ?></textarea><br />
    <input type="submit" value="Submit" />
    <input type="hidden" name="id" value="<?= $category->id ?>" />
</form>

<?php $content = ob_get_clean() ?>

<?php include 'layout.php' ?>
