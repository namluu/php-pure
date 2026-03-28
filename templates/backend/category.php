<?php $title = 'Category Management' ?>
<?php ob_start() ?>
<h2><?= $title ?></h2>
<p><a href="/backend">Back</a></p>
<p><a href="/backend/category/new">Add new</a></p>
<table border="1" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th></th>
    </tr>
    <?php foreach($categories as $category): ?>
    <tr>
        <td><?= $category->id ?></td>
        <td><?= $category->title ?></td>
        <td><a href="/backend/category/edit/<?= $category->id ?>">Edit</a> | <a href="/backend/category/delete/<?= $category->id ?>">Delete</a></td>
    </tr>
    <?php endforeach; ?>
</table>

<?php $content = ob_get_clean() ?>

<?php include 'layout.php' ?>
