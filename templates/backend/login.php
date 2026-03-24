<?php $title = 'Login' ?>
<?php ob_start() ?>
<h1>Login</h1>

<form method="post" action="/backend/login">
    Username:<br /><input type="text" name="username" /><br />
    Password:<br /><input type="password" name="password" /><br />
    <input type="submit" value="Login" />
</form>

<?php $content = ob_get_clean() ?>

<?php include 'layout.php' ?>
