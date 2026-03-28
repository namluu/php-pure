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

function get_categories()
{
    $connection = open_database_connection();
    
    $statement = $connection->query('SELECT * FROM cms_category');
    $statement->execute();
    
    $rows = $statement->fetchAll(PDO::FETCH_OBJ);

    close_database_connection($connection);

    return $rows;
}

function get_category($id)
{
    $connection = open_database_connection();

    $statement = $connection->prepare('SELECT * FROM cms_category WHERE id = :id');
    $statement->bindValue(':id', $id, PDO::PARAM_INT);
    $statement->execute();

    $row = $statement->fetch(PDO::FETCH_OBJ);

    close_database_connection($connection);

    return $row;
}

function save_category($data): bool
{
    $connection = open_database_connection();

    $statement = $connection->prepare('INSERT INTO cms_category (title, content) VALUES (:title, :content)');
    $statement->bindValue(':title', $data['title']);
    $statement->bindValue(':content', $data['content']);
    $affected = $statement->execute();

    close_database_connection($connection);

    return $affected;
}

function update_category($data, $id): bool
{
    $connection = open_database_connection();

    $statement = $connection->prepare('UPDATE cms_category SET title = :title, content = :content WHERE id = :id');
    $statement->bindValue(':title', $data['title']);
    $statement->bindValue(':content', $data['content']);
    $statement->bindValue(':id', $id, PDO::PARAM_INT);
    $affected = $statement->execute();

    close_database_connection($connection);

    return $affected;
}

function delete_category($id)
{
    $connection = open_database_connection();

    $statement = $connection->prepare('DELETE FROM cms_category WHERE id = :id');
    $statement->bindValue(':id', $id, PDO::PARAM_INT);
    $affected = $statement->execute();
    close_database_connection($connection);
    return $affected;
}
