<?php
function home_page()
{
    require 'templates/home.php';
}

function not_found()
{
    header('HTTP/1.1 404 Not Found');
    echo '<html><body><h1>Page Not Found</h1></body></html>';
}
