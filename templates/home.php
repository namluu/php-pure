<?php $title = 'Home Page' ?>
<?php ob_start() ?>
<h1>Hello Home Page</h1>
<?php $content = ob_get_clean() ?>

<?php include 'layout.php' ?>
