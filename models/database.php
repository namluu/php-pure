<?php
function open_database_connection()
{
    return new PDO("mysql:host=db;dbname=wordpress", 'wordpress', 'wordpress');
}

function close_database_connection(&$connection)
{
    $connection = null;
}

function get_login_user($username, $password)
{
    $connection = open_database_connection();

    $statement = $connection->prepare('SELECT id, username FROM admin WHERE username = :username AND password = :password AND status = 1');
    $statement->bindValue(':username', $username, PDO::PARAM_STR);
    $statement->bindValue(':password', md5($password), PDO::PARAM_STR);
    $statement->execute();
    
    $row = $statement->fetch(PDO::FETCH_ASSOC);

    close_database_connection($connection);

    return $row;
}

/**
 * More secure
 */
function get_pwd_from_db($username)
{
    $connection = open_database_connection();

    $statement = $connection->prepare('SELECT password FROM admin WHERE username = :username AND status = 1');
    $statement->bindValue(':username', $username, PDO::PARAM_STR);
    $statement->execute();
    
    $row = $statement->fetch(PDO::FETCH_COLUMN);

    close_database_connection($connection);

    return $row;
}
