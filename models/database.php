<?php
function openDatabaseConnection()
{
    return new PDO("mysql:host=db;dbname=wordpress", 'wordpress', 'wordpress');
}

function closeDatabaseConnection(&$connection)
{
    $connection = null;
}

function getLoginUser($username, $password)
{
    $connection = openDatabaseConnection();

    $statement = $connection->prepare('SELECT id, username FROM admin WHERE username = :username AND password = :password AND status = 1');
    $statement->bindValue(':username', $username, PDO::PARAM_STR);
    $statement->bindValue(':password', md5($password), PDO::PARAM_STR);
    $statement->execute();
    
    $row = $statement->fetch(PDO::FETCH_ASSOC);

    closeDatabaseConnection($connection);

    return $row;
}
