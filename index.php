<?php
require_once 'controllers/storefront.php';
require_once 'controllers/backend.php';
require_once 'models/database.php';

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

match($uri) {
    '/' => home_page(),
    '/backend' => backend_page(),
    '/backend/login' => login_page(),
    '/backend/logout' => logout_action(),
    default => not_found()
};
