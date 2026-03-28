<?php $title = 'Admin' ?>
<?php ob_start() ?>
<h1>Hello Admin : <?= $_SESSION['username'] ?></h1>
<p><a href="/backend/logout">Log out</a></p>
<?php $content = ob_get_clean() ?>

<?php include 'layout.php' ?>
