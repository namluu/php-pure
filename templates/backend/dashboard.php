<?php $title = 'Admin' ?>
<?php ob_start() ?>
<h1>Hello Admin : <?= $_SESSION['username'] ?></h1>
<?php $content = ob_get_clean() ?>

<?php include 'layout.php' ?>
