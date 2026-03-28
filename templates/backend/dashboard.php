<?php $title = 'Admin' ?>
<?php ob_start() ?>
<ul>
    <li><a href="/backend/category">Manage Category</a></li>
</ul>
<?php $content = ob_get_clean() ?>

<?php include 'layout.php' ?>
