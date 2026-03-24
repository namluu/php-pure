<?php
require_once 'controllers/storefront.php';
require_once 'controllers/backend.php';
require_once 'models/database.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

match($uri) {
    '/' => homePage(),
    '/backend' => backendPage(),
    '/backend/login' => loginPage(),
    default => notFound()
};
