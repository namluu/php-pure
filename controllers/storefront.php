<?php
function homePage()
{
    require 'templates/home.php';
}

function notFound()
{
    header('HTTP/1.1 404 Not Found');
    echo '<html><body><h1>Page Not Found</h1></body></html>';
}
