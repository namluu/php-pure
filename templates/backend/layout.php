<!DOCTYPE html>
<html>
<head>
    <title><?= $title ?></title>
</head>
<body>
<h1>Hello Admin : <?= $_SESSION['username'] ?></h1>
<p style="text-align: right"><a href="/backend/logout">Log out</a></p>
<hr>
<?= $content ?>
</body>
</html>
