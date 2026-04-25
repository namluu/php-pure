<?php $title = 'Post Management' ?>
<?php ob_start() ?>
<h2><?= $title ?></h2>
<p><a href="/backend">Back</a></p>
<p><a href="/backend/post/new">Add new</a></p>
<table border="1" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Title</th>
        <th></th>
    </tr>
    <?php foreach($posts as $post): ?>
    <tr>
        <td><?= $post->id ?></td>
        <td><?= $post->title ?></td>
        <td><a href="/backend/post/edit/<?= $post->id ?>">Edit</a> | <a href="/backend/post/delete/<?= $post->id ?>">Delete</a></td>
    </tr>
    <?php endforeach; ?>
</table>

<?php $content = ob_get_clean() ?>

<?php include 'layout.php' ?>
