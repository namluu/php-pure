<?php
require_once 'controllers/storefront.php';
require_once 'controllers/backend.php';
require_once 'models/database.php';

$uri = rtrim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

$editCategoryId = matchUrlParam($uri, '#^/backend/category/edit/(\d+)$#');
$deleteCategoryId = matchUrlParam($uri, '#^/backend/category/delete/(\d+)$#');

match (true) {
    $uri === '' => home_page(),
    $uri === '/backend' => backend_page(),
    $uri === '/backend/login' => login_page(),
    $uri === '/backend/logout' => logout_action(),
    $uri === '/backend/category' => category_page(),
    $uri === '/backend/category/new' => category_new(),
    $editCategoryId !== null => category_edit($editCategoryId),
    $deleteCategoryId !== null => category_delete($deleteCategoryId),
    default => not_found()
};

function matchUrlParam($uri, $requestUrl): ?string
{
    if (preg_match($requestUrl, $uri, $matches)) {
        return $matches[1];
    }

    return null;
}
