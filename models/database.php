<?php
function openDatabaseConnection()
{
    return new PDO("mysql:host=localhost;dbname=wordpress", 'wordpress', 'wordpress');
}

function closeDatabaseConnection(&$connection)
{
    $connection = null;
}

